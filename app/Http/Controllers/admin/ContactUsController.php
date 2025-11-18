<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        if($request->ajax()){
            $query = ContactUs::orderby('id' , 'desc')->where('id' , '>' , 0);
			if($request['search'] != ""){
                $query->where('name' , 'like' , '%' . $request['search'] .'%');
            }
            if($request['status'] != 'All'){
                if($request['status']==2){
                    $request['status']== 0;
                }
            $query->where('status' , $request['status']);
            }
            $models= $query->paginate(10);
            return (string) view('admin.contact_us.search' , compact('models'));
        }

            $page_title= 'All Contact Us';
            $models=ContactUs::where('status' , 1)->paginate(10);
            return view('admin.contact_us.index' , compact('page_title' , 'models'));
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
        $validator = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|max:100',
            'company' => 'required|max:100',
            'plans' => 'required|max:100',
            'quantity' => 'required|max:100',
            'message' => 'required|max:1000',
        ]);

        $model = new ContactUs();
        $model->first_name = $request->first_name;
        $model->last_name = $request->last_name;
        $model->email = $request->email;
        $model->phone = $request->phone; 
        $model->company = $request->company;
        $model->plans = $request->plans;
        $model->quantity = $request->quantity;
        $model->message = $request->message;
        $model->save();

        // Check if the request is coming from the get-a-quote form
        if ($request->has('quote_form')) {
            return redirect()->back()->with('getaquotemessage', 'Your quote request has been submitted successfully!');
        }

        return redirect()->back()->with('contactmessage', 'Your message has been sent. Thank you!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ContactUs::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
