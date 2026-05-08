<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquires;

class EnquiresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page_title = ucwords(str_replace('_', ' ', $identifier)) . ' Enquires';
    
        $enquiries = Enquires::where('identifier', $identifier)
            ->latest()
            ->paginate(10); 
    
        return view('admin.enquires.index', compact('page_title', 'enquiries'));
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
    public function allEnquires(Request $request,$identifier)
    {
        $page_title = ucwords(str_replace('_', ' ', $identifier)) . ' Enquires';
    
        $enquiries = Enquires::where('identifier', $identifier)
            ->latest()
            ->paginate(10); 
    
        return view('admin.enquires.index', compact('page_title', 'enquiries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = 'Enquires Detail';
        $enquiries = Enquires::findOrFail($id);
        return view('admin.enquires.show', compact('page_title', 'enquiries'));
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
