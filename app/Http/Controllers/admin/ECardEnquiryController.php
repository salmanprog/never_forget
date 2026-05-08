<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ECardEnquiry;

class ECardEnquiryController extends Controller
{
    public function index(Request $request)
    {
        $page_title = 'E-Cards';
        $enquiries = ECardEnquiry::with(['user', 'eCardCategory'])->latest()->paginate(10);

        if ($request->ajax()) {
            return view('admin.e-card-enquiry.partials.table', compact('enquiries'))->render();
        }

        return view('admin.e-card-enquiry.index', compact('page_title', 'enquiries'));
    }

    public function show($id)
    {
        $page_title = 'E-Card Detail';
        $enquiry = ECardEnquiry::with(['user', 'eCardCategory'])->findOrFail($id);
        return view('admin.e-card-enquiry.show', compact('page_title', 'enquiry'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|string|in:New Request,Waiting for Design,Awaiting Client Approval,Ready to Send,Completed']);
        $enquiry = ECardEnquiry::findOrFail($id);
        $enquiry->update(['status' => $request->status]);
        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }
}
