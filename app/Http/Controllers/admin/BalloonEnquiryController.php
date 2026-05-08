<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BalloonsEnquiry;
use App\Models\BalloonsCategory;

class BalloonEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page_title = 'Balloon Enquiry';
    
        $balloonEnquiries = BalloonsEnquiry::with(['items.balloon'])
            ->where('is_submitted', 1)
            ->latest()
            ->paginate(10); // 👈 yahan limit
    
        if ($request->ajax()) {
            return view('admin.balloon-enquiry.partials.table', compact('balloonEnquiries'))->render();
        }
    
        return view('admin.balloon-enquiry.index', compact('page_title', 'balloonEnquiries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = 'Balloon Item';
        $balloonEnquiry = BalloonsEnquiry::with(['items.balloon'])
        ->findOrFail($id);
        return view('admin.balloon-enquiry.show', compact('page_title', 'balloonEnquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
