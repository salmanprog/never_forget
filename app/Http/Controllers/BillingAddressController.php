<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use Illuminate\Http\Request;
use Session;
use Auth;

class BillingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*  function __construct()
    {
        $this->middleware('permission:billing_address-list|billing_address-create|billing_address-edit|billing_address-delete', ['only' => ['index','store']]);
        $this->middleware('permission:billing_address-create', ['only' => ['create','store']]);
        $this->middleware('permission:billing_address-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:billing_address-delete', ['only' => ['destroy']]);
    } */
    public function index(Request $request)
    {
        $userId = Auth::user()->id;

        if ($request->ajax()) {
            $query = BillingAddress::where('customer_id', $userId);

            if ($request['search'] != "") {
                $query->where(function($q) use ($request) {
                    $q->where('first_name', 'like', '%' . $request['search'] . '%')
                      ->orWhere('last_name', 'like', '%' . $request['search'] . '%');
                });
            }
            if ($request['status'] != "All") {
                if ($request['status'] == 2) {
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.billing_address.search', compact('models'));
        }

        $page_title = 'All Billing Address';
        // Only get addresses for the current user
        $models = BillingAddress::where('customer_id', $userId)->orderby('id', 'desc')->paginate(10);
        return view('admin.billing_address.index', compact("models", "page_title"));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Billing Address';
        return view('admin.billing_address.create', compact('page_title'));
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
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'company' => 'required|max:100',
            'country' => 'required|max:20',
            'street' => 'required|max:50',
            'town' => 'required|max:20',
            'phone' => 'required|max:20',
            'email' => 'required|max:30',
        ]);

        $BillingAddress = BillingAddress::where('customer_id', Auth::user()->id)->where('id', $request->id)->first();
        if(empty($BillingAddress)){
            $model = new BillingAddress();
            $model->customer_id = Auth::user()->id;
            $model->first_name = $request->first_name;
            $model->last_name = $request->last_name;
            $model->company = $request->company;
            $model->country = $request->country;
            $model->street = $request->street;
            $model->town = $request->town;
            $model->postcode = $request->postcode;
            $model->phone = $request->phone;
            $model->email = $request->email;
            $model->save(); 
            return redirect()->route('billing_address.index')->with('message', 'Billing Address Added Successfully !'); 
        }else{
            /* Update Billing Address */
            $update = BillingAddress::where('customer_id', Auth::user()->id)->where('id', $request->id)->first();
            $update->customer_id = Auth::user()->id;
            $update->first_name = $request->first_name;
            $update->last_name = $request->last_name;
            $update->company = $request->company;
            $update->country = $request->country;
            $update->street = $request->street;
            $update->town = $request->town;
            $update->postcode = $request->postcode;
            $update->phone = $request->phone;
            $update->email = $request->email;
            $update->update();
            return redirect()->route('billing_address.index')->with('message', 'Billing Address Updated Successfully !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = BillingAddress::where('customer_id', Auth::user()->id)->where('id', $id)->first();
        $page_title = 'Show Billing Address';
        return view('admin.billing_address.show', compact('address', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = BillingAddress::where('customer_id', Auth::user()->id)->where('id', $id)->first();
        $page_title = 'Edit Billing Address';
        return view('admin.billing_address.edit', compact('address', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'company' => 'required|max:100',
            'country' => 'required|max:20',
            'street' => 'required|max:50',
            'town' => 'required|max:20',
            'phone' => 'required|max:20',
            'email' => 'required|max:30',
        ]);

        $update = BillingAddress::where('customer_id', Auth::user()->id)->where('id', $id)->first();

        $update->first_name = $request->first_name;
        $update->last_name = $request->last_name;
        $update->company = $request->company;
        $update->country = $request->country;
        $update->street = $request->street;
        $update->town = $request->town;
        $update->postcode = $request->postcode;
        $update->phone = $request->phone;
        $update->email = $request->email;
        $update->update();
        return redirect()->route('billing_address.index')->with('message', 'Billing Address Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = BillingAddress::where('customer_id', Auth::user()->id)->where('id', $id)->first();
        if ($address) {
            $address->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }

    public function getBillingAddres(Request $request)
    {
        $billing_address = BillingAddress::where('id', $request->address_id)->first();
        return (string) view('website.billing-address-details', compact('billing_address'));
    }
}
