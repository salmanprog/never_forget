<?php

namespace App\Http\Controllers;

use App\Models\FriendFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsFamilyController extends Controller
{
    public function index(Request $request)
    {
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

        return view('admin.friends_family.index', compact('records', 'page_title'));
    }

    public function create()
    {
        $page_title = 'Add Friends/Family';
        return view('admin.friends_family.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipient_first_name' => 'required|string|max:255',
            'recipient_last_name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $data = $request->only([
            'recipient_first_name', 'recipient_last_name', 'relationship_with_client', 'email', 'phone',
            'occasion', 'occasion_date', 'gift_preferences', 'favorite_color', 'dietry_restrictions', 'budget',
            'address', 'city', 'state', 'zip', 'delivery_date', 'delivery_note', 'message_with_gift',
            'payment_method', 'tracking_number', 'notes',
        ]);
        $data['user_id'] = Auth::id();

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
            'email' => 'required|email',
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
}
