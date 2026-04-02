<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GreetingsAppreciation;
class GreetingsAppreciationEnquiryController extends Controller
{
    public function index()
    {
        $page_title = 'Greetings & Appreciation Enquiry';

        $greetingsEnquiries = GreetingsAppreciation::with(['items.category'])
            ->where('is_submitted', 1)
            ->latest()
            ->paginate(10);

        return view('admin.greetings-appreciation-enquiry.index', compact('page_title', 'greetingsEnquiries'));
    }

    public function show($id)
    {
        $page_title = 'Greetings & Appreciation Enquiry';
        $greetingsEnquiry = GreetingsAppreciation::with(['items.category'])->findOrFail($id);

        return view('admin.greetings-appreciation-enquiry.show', compact('page_title', 'greetingsEnquiry'));
    }
}
