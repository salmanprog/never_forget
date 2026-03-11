<?php

namespace App\Http\Controllers;

use App\Models\FriendFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as PhpSpreadsheetDate;

class FriendsFamilyController extends Controller
{
    /**
     * Get friends/family limit for the current user (default 5, after upgrade 10).
     *
     * @return array{friends_family: int}
     */
    private function getLimits()
    {
        $user = Auth::user();
        $friendsFamily = (int) ($user->friends_family ?? config('resources.limits.friends_family', 5));
        return ['friends_family' => $friendsFamily];
    }

    /**
     * URL for the individual user to upgrade package.
     */
    private function getUpgradeUrl()
    {
        return route('member.package-upgrade');
    }

    public function index(Request $request)
    {
        Auth::user()->refresh();
        $query = Auth::user()->friendsFamilies()->orderBy('id', 'DESC');

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('recipient_first_name', 'like', '%' . $s . '%')
                    ->orWhere('recipient_last_name', 'like', '%' . $s . '%')
                    ->orWhere('email', 'like', '%' . $s . '%')
                    ->orWhere('phone', 'like', '%' . $s . '%');
            });
        }

        $records = $query->paginate(10)->withQueryString();
        $page_title = 'All Friends/Family';
        $limits = $this->getLimits();
        $friendsFamilyCount = Auth::user()->friendsFamilies()->count();

        return view('admin.friends_family.index', compact('records', 'page_title', 'limits', 'friendsFamilyCount'));
    }

    public function create()
    {
        Auth::user()->refresh();
        $page_title = 'Add Friends/Family';
        $limits = $this->getLimits();
        $friendsFamilyCount = Auth::user()->friendsFamilies()->count();

        return view('admin.friends_family.create', compact('page_title', 'limits', 'friendsFamilyCount'));
    }

    public function store(Request $request)
    {
        $limits = $this->getLimits();
        $friendsFamilyCount = Auth::user()->friendsFamilies()->count();
        if ($friendsFamilyCount >= $limits['friends_family']) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'You have reached your default limit of ' . $limits['friends_family'] . ' friends/family. To add more, please upgrade your package.')
                ->with('upgrade_required', true)
                ->with('upgrade_url', $this->getUpgradeUrl());
        }

        $request->validate([
            'recipient_first_name' => 'required|string|max:255',
            'recipient_last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:friend_families,email,NULL,id,user_id,' . Auth::id(),
        ]);

        $data = $request->only([
            'recipient_first_name', 'recipient_last_name', 'relationship_with_client', 'email', 'phone',
            'occasion', 'occasion_date', 'gift_preferences', 'favorite_color', 'dietry_restrictions', 'budget',
            'address', 'city', 'state', 'zip', 'delivery_date', 'delivery_note', 'message_with_gift',
            'payment_method', 'tracking_number', 'notes',
        ]);
        $data['user_id'] = Auth::id();
        $data['delivery_status'] = 'pending';

        if (!empty($data['occasion_date'])) {
            $data['occasion_date'] = \Carbon\Carbon::parse($data['occasion_date'])->format('Y-m-d');
        }
        if (!empty($data['delivery_date'])) {
            $data['delivery_date'] = \Carbon\Carbon::parse($data['delivery_date'])->format('Y-m-d');
        }

        FriendFamily::create($data);

        return redirect()->route('member.friends_family.index')->with('success', 'Friends/Family added successfully.');
    }

    public function edit($id)
    {
        $record = Auth::user()->friendsFamilies()->findOrFail($id);
        $page_title = 'Edit Friends/Family';
        return view('admin.friends_family.edit', compact('record', 'page_title'));
    }

    public function update(Request $request, $id)
    {
        $record = Auth::user()->friendsFamilies()->findOrFail($id);

        $request->validate([
            'recipient_first_name' => 'required|string|max:255',
            'recipient_last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:friend_families,email,' . $record->id . ',id,user_id,' . Auth::id(),
        ]);

        $data = $request->only([
            'recipient_first_name', 'recipient_last_name', 'relationship_with_client', 'email', 'phone',
            'occasion', 'occasion_date', 'gift_preferences', 'favorite_color', 'dietry_restrictions', 'budget',
            'address', 'city', 'state', 'zip', 'delivery_date', 'delivery_note', 'message_with_gift',
            'payment_method', 'tracking_number', 'notes',
        ]);
        if (!empty($data['occasion_date'])) {
            $data['occasion_date'] = \Carbon\Carbon::parse($data['occasion_date'])->format('Y-m-d');
        } else {
            $data['occasion_date'] = null;
        }
        if (!empty($data['delivery_date'])) {
            $data['delivery_date'] = \Carbon\Carbon::parse($data['delivery_date'])->format('Y-m-d');
        } else {
            $data['delivery_date'] = null;
        }

        $record->update($data);

        return redirect()->route('member.friends_family.index')->with('success', 'Friends/Family updated successfully.');
    }

    public function destroy($id)
    {
        $record = Auth::user()->friendsFamilies()->findOrFail($id);
        $record->delete();
        return response()->json(['success' => true]);
    }

    /**
     * Process bulk upload of friends/family from CSV or Excel (individual-gifting-csv.xlsx).
     */
    public function processBulkUpload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt,xlsx,xls|max:2048',
        ], [
            'csv_file.required' => 'Please select a file to upload.',
            'csv_file.mimes' => 'File must be CSV or Excel (.csv, .txt, .xlsx, .xls).',
            'csv_file.max' => 'File size must not exceed 2MB.',
        ]);

        $file = $request->file('csv_file');
        $ext = strtolower($file->getClientOriginalExtension());
        $path = $file->getRealPath();

        $rows = $this->readBulkUploadFile($path, $ext);
        if (empty($rows['headers']) || empty($rows['rows'])) {
            return redirect()->route('member.friends_family.bulk-upload')
                ->with('error', 'File is empty or could not be read. Ensure the first row contains column headers.');
        }

        $headerMap = $this->getFriendsFamilyHeaderMap();
        $userId = Auth::id();
        $limits = $this->getLimits();
        $friendsFamilyCount = Auth::user()->friendsFamilies()->count();
        $successCount = 0;
        $errors = [];
        $limitReached = false;

        foreach ($rows['rows'] as $index => $row) {
            if ($friendsFamilyCount >= $limits['friends_family']) {
                $errors[] = 'Row ' . ($index + 2) . ': Friends/family limit reached.';
                $limitReached = true;
                continue;
            }
            $record = $this->mapRowToFriendFamily($rows['headers'], $row, $headerMap);
            if (empty($record['recipient_first_name']) && empty($record['recipient_last_name']) && empty($record['email'])) {
                continue;
            }
            $validator = Validator::make($record, [
                'recipient_first_name' => 'required|string|max:255',
                'recipient_last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:friend_families,email,NULL,id,user_id,' . $userId,
            ]);
            if ($validator->fails()) {
                $errors[] = 'Row ' . ($index + 2) . ': ' . implode(', ', $validator->errors()->all());
                continue;
            }
            $record['user_id'] = $userId;
            $record['delivery_status'] = $record['delivery_status'] ?? 'pending';
            // Parse date fields right before create (same as company bulk upload)
            $record['occasion_date'] = $this->parseBulkUploadDate($record['occasion_date'] ?? null);
            $record['delivery_date'] = $this->parseBulkUploadDate($record['delivery_date'] ?? null);
            FriendFamily::create($record);
            $friendsFamilyCount++;
            $successCount++;
        }

        $message = "Bulk upload completed. Success: {$successCount}";
        if (!empty($errors)) {
            $message .= ', Errors: ' . count($errors);
            $message .= '. ' . implode('; ', array_slice($errors, 0, 5));
            if (count($errors) > 5) {
                $message .= ' and ' . (count($errors) - 5) . ' more.';
            }
        }
        $redirect = redirect()->route('member.friends_family.index')
            ->with(!empty($errors) ? 'warning' : 'success', $message);
        if ($limitReached) {
            $redirect->with('upgrade_required', true)->with('upgrade_url', $this->getUpgradeUrl())
                ->with('error', 'Limit reached. Please upgrade your package to add more.');
        }
        return $redirect;
    }

    /**
     * Friends/Family Gifting page: list of sent gifts (delivery_status shipped or delivered). Same as company Resource Gifting.
     */
    public function giftingIndex()
    {
        $sentGifts = Auth::user()->friendsFamilies()
            ->whereIn('delivery_status', ['shipped', 'delivered'])
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.friends_family.gifting', compact('sentGifts'));
    }

    /**
     * Show bulk upload form (same as company dashboard).
     */
    public function bulkUpload()
    {
        Auth::user()->refresh();
        $page_title = 'Bulk Upload Friends/Family';
        $limits = $this->getLimits();
        $friendsFamilyCount = Auth::user()->friendsFamilies()->count();

        return view('admin.friends_family.bulk-upload', compact('page_title', 'limits', 'friendsFamilyCount'));
    }

    private function getFriendsFamilyHeaderMap(): array
    {
        $map = [
            'first name' => 'recipient_first_name',
            'firstname' => 'recipient_first_name',
            'recipient first name' => 'recipient_first_name',
            'last name' => 'recipient_last_name',
            'lastname' => 'recipient_last_name',
            'recipient last name' => 'recipient_last_name',
            'email' => 'email',
            'phone' => 'phone',
            'dob' => 'occasion_date',
            'occasion date' => 'occasion_date',
            'relationship' => 'relationship_with_client',
            'relationship with client' => 'relationship_with_client',
            'favorite color' => 'favorite_color',
            'hobbies' => 'notes',
            'occasion' => 'occasion',
            'gift preferences' => 'gift_preferences',
            'notes' => 'notes',
            'dietry restrictions' => 'dietry_restrictions',
            'budget' => 'budget',
            'address' => 'address',
            'city' => 'city',
            'state' => 'state',
            'zip' => 'zip',
            'delivery date' => 'delivery_date',
            'delivery note' => 'delivery_note',
            'message with gift' => 'message_with_gift',
            'payment method' => 'payment_method',
            'tracking number' => 'tracking_number',
        ];
        $out = [];
        foreach ($map as $title => $field) {
            $out[trim($title)] = $field;
        }
        return $out;
    }

    private function readBulkUploadFile(string $path, string $ext): array
    {
        if (in_array($ext, ['xlsx', 'xls'], true)) {
            $spreadsheet = IOFactory::load($path);
            $sheet = $spreadsheet->getActiveSheet();
            // formatData = false so date cells come as Excel serial numbers (float), not formatted strings (same as company bulk upload)
            $rows = $sheet->toArray(null, true, false, true);
            $rows = array_values(array_map('array_values', $rows));
        } else {
            $lines = @file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
            if (empty($lines)) {
                return ['headers' => [], 'rows' => []];
            }
            $rows = array_map(function ($line) {
                return str_getcsv($line);
            }, $lines);
        }
        if (empty($rows)) {
            return ['headers' => [], 'rows' => []];
        }
        $headers = array_map('trim', $rows[0]);
        $dataRows = array_slice($rows, 1);
        return ['headers' => $headers, 'rows' => $dataRows];
    }

    private function mapRowToFriendFamily(array $headers, array $row, array $headerMap): array
    {
        $record = array_fill_keys((new FriendFamily())->getFillable(), null);
        unset($record['user_id']);
        $normalizedMap = [];
        foreach ($headerMap as $title => $field) {
            $normalizedMap[strtolower(trim($title))] = $field;
        }
        $isDateField = ['occasion_date', 'delivery_date'];
        foreach ($headers as $colIndex => $header) {
            $key = strtolower(trim((string) $header));
            $field = $normalizedMap[$key] ?? null;
            if (!$field || !array_key_exists($field, $record)) {
                continue;
            }
            $raw = $row[$colIndex] ?? null;
            // Keep date fields as raw value (float for Excel serial, string, or DateTime) so parseBulkUploadDate can handle later (same as company bulk upload)
            if (in_array($field, $isDateField, true)) {
                $record[$field] = ($raw !== null && $raw !== '') ? $raw : null;
            } else {
                if ($raw === null || $raw === '') {
                    continue;
                }
                $record[$field] = is_float($raw) || is_int($raw) ? (string) $raw : trim((string) $raw);
            }
        }
        return $record;
    }

    private function parseBulkUploadDate($value)
{
    if ($value === null || $value === '') {
        return null;
    }
    
    // Handle if it's an instance of DateTime
    if ($value instanceof \DateTimeInterface) {
        return $value->format('Y-m-d');
    }

    // Handle Excel serial date (numeric value)
    if (is_numeric($value)) {
        $num = (float) $value;
        if ($num >= 1 && $num <= 2958465) {
            try {
                // Use PhpSpreadsheetDate to convert Excel serial date to DateTime object
                $dt = PhpSpreadsheetDate::excelToDateTimeObject($num);
                return $dt ? $dt->format('Y-m-d') : null;
            } catch (\Throwable $e) {
                $days = (int) $num;
                if ($days >= 61) {
                    $days--;
                }
                $unix = ($days - 25569) * 86400;
                return date('Y-m-d', $unix);
            }
        }
    }

    // If the value is in string format, check if it's in DD/MM/YYYY format
    if (is_string($value)) {
        // Check if it's in the format DD/MM/YYYY
        $date = \Carbon\Carbon::createFromFormat('d/m/Y', $value);
        if ($date) {
            return $date->format('Y-m-d');
        }
    }
    
    // Try parsing date using Carbon if it's in string format
    try {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    } catch (\Throwable $e) {
        return null;  // If parsing fails, return null
    }
}
}
