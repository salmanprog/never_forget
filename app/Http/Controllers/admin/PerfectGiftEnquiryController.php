<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerfectGiftEnquiry;
use App\Models\PerfectGiftCategory;

class PerfectGiftEnquiryController extends Controller
{
    public function index(Request $request)
    {
        $page_title = 'Perfect Gift Enquiry';

        $perfectGiftEnquiries = PerfectGiftEnquiry::with(['items.perfectGift'])
            ->where('is_submitted', 1)
            ->latest()
            ->paginate(10);

        if ($request->ajax()) {
            return view('admin.perfect-gift-enquiry.partials.table', compact('perfectGiftEnquiries'))->render();
        }

        return view('admin.perfect-gift-enquiry.index', compact('page_title', 'perfectGiftEnquiries'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $page_title = 'Perfect Gift Item';
        $perfectGiftEnquiry = PerfectGiftEnquiry::with(['items.perfectGift'])
            ->findOrFail($id);
        return view('admin.perfect-gift-enquiry.show', compact('page_title', 'perfectGiftEnquiry'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
