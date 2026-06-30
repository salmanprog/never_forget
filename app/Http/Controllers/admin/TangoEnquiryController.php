<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TangoEnquiry;
use Illuminate\Http\Request;

class TangoEnquiryController extends Controller
{
    public function index(Request $request)
    {
        $page_title = 'Tango Enquiries';
        $enquiries = TangoEnquiry::with(['user', 'tangoCategory'])->latest()->paginate(10);

        if ($request->ajax()) {
            return view('admin.tango-enquiry.partials.table', compact('enquiries'))->render();
        }

        return view('admin.tango-enquiry.index', compact('page_title', 'enquiries'));
    }

    public function show($id)
    {
        $page_title = 'Tango Enquiry Detail';
        $enquiry = TangoEnquiry::with(['user', 'tangoCategory'])->findOrFail($id);

        return view('admin.tango-enquiry.show', compact('page_title', 'enquiry'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:New Request,Waiting for Design,Awaiting Client Approval,Ready to Send,Completed',
        ]);

        $enquiry = TangoEnquiry::findOrFail($id);
        $enquiry->update(['status' => $request->status]);

        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }
}
