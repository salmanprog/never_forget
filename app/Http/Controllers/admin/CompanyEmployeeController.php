<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\CompanyEmployee;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as PhpSpreadsheetDate;

class CompanyEmployeeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:company_employee-list|company_employee-create|company_employee-edit|company_employee-delete', ['only' => ['index', 'store', 'giftingIndex']]);
        $this->middleware('permission:company_employee-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:company_employee-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:company_employee-delete', ['only' => ['destroy']]);
    }

    /**
     * Get the company for the current user or return null
     */
    private function getCompany()
    {
        $user = Auth::user();
        return $user->administeredCompany;
    }

    /**
     * Get resource limits (employees, clients) for the current user from user record or config defaults.
     *
     * @return array{employees: int, clients: int}
     */
    private function getLimits()
    {
        $user = Auth::user();
        $employees = (int) ($user->employees ?? config('resources.limits.employees', 10));
        $clients   = (int) ($user->clients ?? config('resources.limits.clients', 5));
        return ['employees' => $employees, 'clients' => $clients];
    }

    /**
     * URL for the company user to upgrade package (dashboard page).
     */
    private function getUpgradeUrl()
    {
        return route('company.package-upgrade');
    }

    /**
     * Display a listing of employees for the company
     */
    public function index(Request $request)
    {
        // Ensure we have latest limits from DB (e.g. after package upgrade payment)
        Auth::user()->refresh();
        $user = Auth::user();
        $company = $this->getCompany();

        // If no company, show empty page with message to create company
        if (!$company) {
            $page_title = 'Company Resources';
            // Create a paginator with empty collection
            $employees = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10, 1);
            return view('admin.company_employee.index', compact('employees', 'page_title', 'company'));
        }

        $page_title = 'Company Resources';

        // Build query
        $query = $company->employees()->orderBy('id', 'DESC');

        // Apply search filter
        if ($request->get('search') != "") {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->get('search') . '%')
                    ->orWhere('last_name', 'like', '%' . $request->get('search') . '%')
                    ->orWhere('email', 'like', '%' . $request->get('search') . '%')
                    ->orWhere('phone', 'like', '%' . $request->get('search') . '%');
            });
        }

        // Apply type filter
        if ($request->get('type') != "All" && $request->get('type') != null) {
            $query->where('type', $request->get('type'));
        }

        // Apply status filter (if needed in future)
        // if($request->get('status') != "All" && $request->get('status') != null){
        //     $query->where('is_active', $request->get('status') == 'Active' ? 1 : 0);
        // }

        $employees = $query->paginate(10)->withQueryString();

        // Handle AJAX requests
        if ($request->ajax()) {
            return view('admin.company_employee.search', compact('employees'));
        }

        $limits = $this->getLimits();
        $employeeCount = $company->employees()->where('type', 'employee')->count();
        $clientCount = $company->employees()->where('type', 'client')->count();

        return view('admin.company_employee.index', compact('employees', 'page_title', 'company', 'limits', 'employeeCount', 'clientCount'));
    }

    /**
     * Show the form for creating a new employee
     */
    public function create()
    {
        Auth::user()->refresh();
        $company = $this->getCompany();

        if (!$company) {
            return redirect()->route('admin.company.create')
                ->with('error', 'Please create a company first before adding employees.');
        }

        $limits = $this->getLimits();
        $employeeCount = $company->employees()->where('type', 'employee')->count();
        $clientCount = $company->employees()->where('type', 'client')->count();

        $page_title = 'Add Resource';
        return view('admin.company_employee.create', compact('page_title', 'limits', 'employeeCount', 'clientCount'));
    }

    /**
     * Store a newly created employee (all template columns)
     */
    public function store(Request $request)
    {
        $company = $this->getCompany();
        if (!$company) {
            return redirect()->back()->with('error', 'Company not found.');
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:company_employees,email,NULL,id,company_id,' . $company->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'hire_date' => 'nullable|date',
            'gift_send_date' => 'nullable|date',
            'work_anniversary_date' => 'nullable|date',
            'type' => 'required|in:employee,client'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $limits = $this->getLimits();
        $employeeCount = $company->employees()->where('type', 'employee')->count();
        $clientCount = $company->employees()->where('type', 'client')->count();
        $type = $request->type;

        if ($type === 'employee' && $employeeCount >= $limits['employees']) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'You have reached your default limit of ' . $limits['employees'] . ' employees. To add more, please upgrade your package.')
                ->with('upgrade_required', true)
                ->with('upgrade_url', $this->getUpgradeUrl());
        }
        if ($type === 'client' && $clientCount >= $limits['clients']) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'You have reached your default limit of ' . $limits['clients'] . ' clients. To add more, please upgrade your package.')
                ->with('upgrade_required', true)
                ->with('upgrade_url', $this->getUpgradeUrl());
        }

        $dateOfBirth = $request->date_of_birth ? Carbon::parse($request->date_of_birth)->format('Y-m-d') : null;
        $hireDate = $request->hire_date ? Carbon::parse($request->hire_date)->format('Y-m-d') : null;
        $giftSendDate = $request->gift_send_date ? Carbon::parse($request->gift_send_date)->format('Y-m-d') : null;
        $workAnniversaryDate = $request->work_anniversary_date ? Carbon::parse($request->work_anniversary_date)->format('Y-m-d') : null;

        CompanyEmployee::create([
            'company_id' => $company->id,
            'type' => $request->type,
            'client_status' => $request->client_status,
            'client_since' => $request->client_since,
            'department' => $request->department,
            'employee_id' => $request->employee_id,
            'job_title' => $request->job_title,
            'hire_date' => $hireDate,
            'employment_status' => $request->employment_status,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'shipping_address' => $request->shipping_address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'date_of_birth' => $dateOfBirth,
            'work_anniversary_date' => $workAnniversaryDate,
            'favorite_color' => $request->favorite_color,
            'hobbies' => $request->hobbies,
            'dietry_restriction' => $request->dietry_restriction,
            'budget_range' => $request->budget_range,
            'gift_preferences' => $request->gift_preferences,
            'occasion' => $request->occasion,
            'gift_send_date' => $giftSendDate,
            'payment_method' => $request->payment_method,
            'tracking_number' => $request->tracking_number,
            'delivery_notes' => $request->delivery_notes,
            'delivery_status' => $request->delivery_status ?? 'pending',
            'notes' => $request->notes,
            'invite_token' => CompanyEmployee::generateInviteToken(),
            'invited_at' => Carbon::now()
        ]);

        return redirect()->route('admin.company_employee.index')
            ->with('success', 'Resource added successfully!');
    }

    /**
     * Show bulk upload form
     */
    public function bulkUpload()
    {
        Auth::user()->refresh();
        $company = $this->getCompany();

        if (!$company) {
            return redirect()->route('admin.company.create')
                ->with('error', 'Please create a company first before uploading employees.');
        }

        $limits = $this->getLimits();
        $employeeCount = $company->employees()->where('type', 'employee')->count();
        $clientCount = $company->employees()->where('type', 'client')->count();

        $page_title = 'Bulk Upload Resources';
        return view('admin.company_employee.bulk-upload', compact('page_title', 'limits', 'employeeCount', 'clientCount'));
    }

    /** Template column title -> DB field. Matches index columns. Column A, B, C etc. are ignored. */
    private function getBulkUploadHeaderMap(): array
    {
        return [
            'Contact Type' => 'type',
            'Client Status' => 'client_status',
            'Client Since' => 'client_since',
            'Department' => 'department',
            'Employee ID' => 'employee_id',
            'Job Title' => 'job_title',
            'Hire Date' => 'hire_date',
            'Employment Status' => 'employment_status',
            'First Name' => 'first_name',
            'Last Name' => 'last_name',
            'Email' => 'email',
            'Shipping Address' => 'shipping_address',
            'City' => 'city',
            'State' => 'state',
            'Zip' => 'zip',
            'ZIP' => 'zip',
            'DOB' => 'date_of_birth',
            'Date of Birth' => 'date_of_birth',
            'Work Anniversary Date' => 'work_anniversary_date',
            'Work Anniversay Date' => 'work_anniversary_date', // common typo in template
            'Favorite Color' => 'favorite_color',
            'Hobbies' => 'hobbies',
            'Dietry Restriction' => 'dietry_restriction',
            'Dietary Restriction' => 'dietry_restriction',
            'Budget Range' => 'budget_range',
            'Gift Preferences' => 'gift_preferences',
            'Occasion' => 'occasion',
            'Gift Sent Date' => 'gift_send_date',
            'Gift Send Date' => 'gift_send_date',
            'Payment Method' => 'payment_method',
            'Tracking Number' => 'tracking_number',
            'Delivery Note' => 'delivery_notes',
            'Delivery Notes' => 'delivery_notes',
            'Delivery Status' => 'delivery_status',
            'Notes' => 'notes',
            'Cell' => 'phone',
            'Phone' => 'phone',
        ];
    }

    /** Build case-insensitive header lookup so "ZIP", "Zip", "zip" etc. all map correctly. */
    private function getBulkUploadHeaderMapNormalized(): array
    {
        $map = [];
        foreach ($this->getBulkUploadHeaderMap() as $title => $field) {
            $map[strtolower(trim($title))] = $field;
        }
        return $map;
    }

    private function isPlaceholderColumn(string $header): bool
    {
        return (bool) preg_match('/^Column [A-Z]+$/i', trim($header));
    }

    private function readUploadedFileRows($uploadedFile): array
    {
        $path = $uploadedFile->getRealPath();
        $ext = strtolower($uploadedFile->getClientOriginalExtension());

        if (in_array($ext, ['xlsx', 'xls'], true)) {
            $spreadsheet = IOFactory::load($path);
            $sheet = $spreadsheet->getActiveSheet();
            // Use formatData = false so date cells come as Excel serial numbers (float), not formatted strings
            $rows = $sheet->toArray(null, true, false, true);
            $rows = array_values(array_map('array_values', $rows));
        } else {
            $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
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

    private function rowToRecord(array $headers, array $row, array $headerToField): array
    {
        $record = array_fill_keys([
            'type',
            'client_status',
            'client_since',
            'department',
            'employee_id',
            'job_title',
            'hire_date',
            'employment_status',
            'first_name',
            'last_name',
            'email',
            'phone',
            'shipping_address',
            'city',
            'state',
            'zip',
            'date_of_birth',
            'work_anniversary_date',
            'favorite_color',
            'hobbies',
            'dietry_restriction',
            'budget_range',
            'gift_preferences',
            'occasion',
            'gift_send_date',
            'payment_method',
            'tracking_number',
            'delivery_notes',
            'delivery_status',
            'notes'
        ], null);
        $record['type'] = 'employee';

        foreach ($headers as $colIndex => $header) {
            if ($this->isPlaceholderColumn($header)) {
                continue;
            }
            $headerKey = strtolower(trim((string) $header));
            $field = $headerToField[$headerKey] ?? null;
            if (!$field) {
                continue;
            }
            $raw = $row[$colIndex] ?? null;
            // Keep date fields as raw value (float for Excel serial, string, or DateTime) so parseDate can handle all
            $isDateField = in_array($field, ['gift_send_date', 'date_of_birth', 'hire_date', 'work_anniversary_date', 'client_since'], true);
            if ($isDateField) {
                $value = $raw;
            } else {
                $value = $raw !== null && $raw !== '' ? (is_float($raw) || is_int($raw) ? $raw : trim((string) $raw)) : '';
            }
            if ($field === 'type') {
                $record['type'] = $this->normalizeContactType((string) $value);
            } elseif ($field === 'phone' && $value !== '' && $value !== null) {
                if ($record['phone'] === null || $record['phone'] === '') {
                    $record['phone'] = is_float($value) || is_int($value) ? (string) $value : trim((string) $value);
                }
            } elseif ($isDateField) {
                $record[$field] = ($value !== '' && $value !== null) ? $value : null;
            } else {
                $record[$field] = $value !== '' ? $value : null;
            }
        }
        return $record;
    }

    private function normalizeContactType(string $value): string
    {
        $v = strtolower(trim($value));
        if ($v === 'employee') {
            return 'employee';
        }
        if ($v === 'client' || $v === 'customer' || stripos($value, 'client') !== false) {
            return 'client';
        }
        return 'employee';
    }

    private function parseDate($value)
    {
        if ($value === null || $value === '') {
            return null;
        }

        // If value is a DateTime object, return formatted date
        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d');
        }

        // If it's a string, we try to format it using known formats
        if (is_string($value)) {
            $value = trim($value);
            if ($value === '') {
                return null;
            }
        }

        // If it's a numeric value (Excel serial number), convert to date
        if (is_numeric($value)) {
            // PhpSpreadsheet Date conversion for serial numbers
            try {
                $dateTime = PhpSpreadsheetDate::excelToDateTimeObject($value);
                return $dateTime ? $dateTime->format('Y-m-d') : null;
            } catch (\Exception $e) {
                // Fallback to manual conversion (Excel serial to Unix timestamp)
                if ($value >= 1 && $value <= 2958465) {
                    $days = (int) $value;
                    if ($days >= 61) {
                        $days -= 1; // Excel 1900 Leap Year Bug fix
                    }
                    $unix = ($days - 25569) * 86400;
                    return date('Y-m-d', $unix);
                }
            }
        }

        // Try parsing string dates if not already recognized
        try {
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return null; // Return null if parsing fails
        }
    }

    /**
     * Process bulk upload (CSV or XLSX). Maps columns by title (Contact Type through Notes). Column A, B, C ignored.
     */
    public function processBulkUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt,xlsx,xls|max:2048'
        ]);

        $dateOfBirth = $this->parseDate($request->date_of_birth);
        $hireDate = $this->parseDate($request->hire_date);
        $workAnniversaryDate = $this->parseDate($request->work_anniversary_date);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company = $this->getCompany();
        if (!$company) {
            return redirect()->back()->with('error', 'Company not found.');
        }

        $limits = $this->getLimits();
        $employeeCount = $company->employees()->where('type', 'employee')->count();
        $clientCount = $company->employees()->where('type', 'client')->count();

        $file = $request->file('csv_file');
        $ext = strtolower($file->getClientOriginalExtension());
        if (in_array($ext, ['xlsx', 'xls'], true) && !class_exists('ZipArchive')) {
            return redirect()->back()->with(
                'error',
                'Excel files require the PHP Zip extension. Enable it in php.ini (extension=zip) and restart Apache, or upload a CSV file instead.'
            );
        }

        $headerMap = $this->getBulkUploadHeaderMapNormalized();
        $read = $this->readUploadedFileRows($file);
        $headers = $read['headers'];
        $dataRows = $read['rows'];

        if (empty($headers)) {
            return redirect()->back()->with('error', 'File has no header row or could not be read.');
        }

        $successCount = 0;
        $errorCount = 0;
        $errors = [];
        $limitReached = false;

        foreach ($dataRows as $index => $row) {
            $record = $this->rowToRecord($headers, $row, $headerMap);
            if (($record['first_name'] ?? '') === '' && ($record['last_name'] ?? '') === '' && ($record['email'] ?? '') === '') {
                continue;
            }

            $data = [
                'first_name' => $record['first_name'] ?? '',
                'last_name' => $record['last_name'] ?? '',
                'email' => $record['email'] ?? '',
                'phone' => $record['phone'],
                'date_of_birth' => $this->parseDate($record['date_of_birth'] ?? null),
                'type' => $record['type'],
            ];

            $rowValidator = Validator::make($data, [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:company_employees,email,NULL,id,company_id,' . $company->id,
                'phone' => 'nullable|string|max:20',
                'date_of_birth' => 'nullable|date',
                'type' => 'required|in:employee,client'
            ]);

            if ($rowValidator->fails()) {
                $errors[] = 'Row ' . ($index + 2) . ': ' . implode(', ', $rowValidator->errors()->all());
                $errorCount++;
                continue;
            }

            $type = $data['type'];
            if ($type === 'employee' && $employeeCount >= $limits['employees']) {
                $errors[] = 'Row ' . ($index + 2) . ': Employee limit reached.';
                $errorCount++;
                $limitReached = true;
                continue;
            }
            if ($type === 'client' && $clientCount >= $limits['clients']) {
                $errors[] = 'Row ' . ($index + 2) . ': Client limit reached.';
                $errorCount++;
                $limitReached = true;
                continue;
            }

            try {
                CompanyEmployee::create([
                    'company_id' => $company->id,
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone' => $record['phone'],
                    'date_of_birth' => $data['date_of_birth'],
                    'type' => $data['type'],
                    'client_status' => $record['client_status'],
                    'client_since' => $this->parseDate($record['client_since'] ?? null) ?? $record['client_since'],
                    'department' => $record['department'],
                    'employee_id' => $record['employee_id'],
                    'job_title' => $record['job_title'],
                    'hire_date' => $this->parseDate($record['hire_date'] ?? null),
                    'employment_status' => $record['employment_status'],
                    'shipping_address' => $record['shipping_address'],
                    'city' => $record['city'],
                    'state' => $record['state'],
                    'zip' => $record['zip'],
                    'work_anniversary_date' => $this->parseDate($record['work_anniversary_date'] ?? null),
                    'favorite_color' => $record['favorite_color'],
                    'hobbies' => $record['hobbies'],
                    'dietry_restriction' => $record['dietry_restriction'],
                    'budget_range' => $record['budget_range'],
                    'gift_preferences' => $record['gift_preferences'],
                    'occasion' => $record['occasion'],
                    'gift_send_date' => $this->parseDate($record['gift_send_date'] ?? null),
                    'payment_method' => $record['payment_method'],
                    'tracking_number' => $record['tracking_number'],
                    'delivery_notes' => $record['delivery_notes'],
                    'delivery_status' => $record['delivery_status'] ?? 'pending',
                    'notes' => $record['notes'],
                    'invite_token' => CompanyEmployee::generateInviteToken(),
                    'invited_at' => Carbon::now()
                ]);

                if ($type === 'employee') {
                    $employeeCount++;
                } else {
                    $clientCount++;
                }
                $successCount++;
            } catch (\Exception $e) {
                $errors[] = 'Row ' . ($index + 2) . ': ' . $e->getMessage();
                $errorCount++;
            }
        }

        $message = "Bulk upload completed. Success: {$successCount}, Errors: {$errorCount}";
        if (!empty($errors)) {
            $message .= '. ' . implode('; ', array_slice($errors, 0, 5));
            if (count($errors) > 5) {
                $message .= ' and ' . (count($errors) - 5) . ' more.';
            }
        }

        $redirect = redirect()->route('admin.company_employee.index')
            ->with($errorCount > 0 ? 'warning' : 'success', $message);
        if ($limitReached) {
            $redirect->with('upgrade_required', true)->with('upgrade_url', $this->getUpgradeUrl())
                ->with('error', 'Limit reached. Please upgrade your package to add more.');
        }
        return $redirect;
    }

    /**
     * Download CSV/Excel template (serves file from public/csvs/)
     */
    public function downloadTemplate()
    {
        $filePath = public_path('csvs/Company Gifting CSV.xlsx');

        if (!file_exists($filePath)) {
            abort(404, 'Template file not found.');
        }

        return response()->download($filePath, 'Company Gifting CSV.xlsx');
    }

    /**
     * Resource Gifting page: list of gifts sent (delivery_status shipped or delivered).
     */
    public function giftingIndex()
    {
        $company = $this->getCompany();
        $sentGifts = $company
            ? $company->employees()->whereIn('delivery_status', ['shipped', 'delivered'])->orderBy('id', 'DESC')->get()
            : collect();
        return view('admin.employee-gifting.index', compact('sentGifts'));
    }

    /**
     * Show the form for editing the specified employee
     */
    public function edit($id)
    {
        $company = $this->getCompany();
        $employee = $company->employees()->findOrFail($id);

        $page_title = 'Edit Employee';
        return view('admin.company_employee.edit', compact('employee', 'page_title'));
    }

    /**
     * Update the specified employee (all template columns)
     */
    public function update(Request $request, $id)
    {
        $company = $this->getCompany();
        $employee = $company->employees()->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:company_employees,email,' . $employee->id . ',id,company_id,' . $company->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'hire_date' => 'nullable|date',
            'gift_send_date' => 'nullable|date',
            'work_anniversary_date' => 'nullable|date',
            'type' => 'required|in:employee,client'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dateOfBirth = $request->date_of_birth ? Carbon::parse($request->date_of_birth)->format('Y-m-d') : null;
        $hireDate = $request->hire_date ? Carbon::parse($request->hire_date)->format('Y-m-d') : null;
        $giftSendDate = $request->gift_send_date ? Carbon::parse($request->gift_send_date)->format('Y-m-d') : null;
        $workAnniversaryDate = $request->work_anniversary_date ? Carbon::parse($request->work_anniversary_date)->format('Y-m-d') : null;

        $employee->update([
            'type' => $request->type,
            'client_status' => $request->client_status,
            'client_since' => $request->client_since,
            'department' => $request->department,
            'employee_id' => $request->employee_id,
            'job_title' => $request->job_title,
            'hire_date' => $hireDate,
            'employment_status' => $request->employment_status,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'shipping_address' => $request->shipping_address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'date_of_birth' => $dateOfBirth,
            'work_anniversary_date' => $workAnniversaryDate,
            'favorite_color' => $request->favorite_color,
            'hobbies' => $request->hobbies,
            'dietry_restriction' => $request->dietry_restriction,
            'budget_range' => $request->budget_range,
            'gift_preferences' => $request->gift_preferences,
            'occasion' => $request->occasion,
            'gift_send_date' => $giftSendDate,
            'payment_method' => $request->payment_method,
            'tracking_number' => $request->tracking_number,
            'delivery_notes' => $request->delivery_notes,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.company_employee.index')
            ->with('success', 'Resource updated successfully!');
    }

    /**
     * Remove the specified employee
     */
    public function destroy($id)
    {
        $company = $this->getCompany();
        $employee = $company->employees()->findOrFail($id);

        $employee->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Resend invitation to employee
     */
    public function resendInvitation($id)
    {
        $company = $this->getCompany();
        $employee = $company->employees()->findOrFail($id);

        $employee->update([
            'invite_token' => CompanyEmployee::generateInviteToken(),
            'invited_at' => Carbon::now()
        ]);

        $this->sendInvitationEmail($employee);

        return redirect()->back()
            ->with('success', 'Invitation resent successfully!');
    }

    /**
     * Send invitation email to employee
     */
    private function sendInvitationEmail($employee)
    {
        try {
            Mail::send('emails.employee-invitation', [
                'employee' => $employee,
                'company' => $employee->company,
                'inviteUrl' => route('employee.accept-invitation', $employee->invite_token)
            ], function ($message) use ($employee) {
                $message->to($employee->email)
                    ->subject('Invitation to join ' . $employee->company->name);
            });
        } catch (\Exception $e) {
            Log::error('Failed to send invitation email: ' . $e->getMessage());
        }
    }
}
