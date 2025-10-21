<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Session;
use Auth;

class ShippingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::user()->id;

        if ($request->ajax()) {
            $query = ShippingAddress::where('customer_id', $userId);

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
            return (string) view('admin.shipping_address.search', compact('models'));
        }

        $page_title = 'Shipping Address';
        $models = ShippingAddress::where('customer_id', $userId)->orderby('id', 'desc')->paginate(10);
        return view('admin.shipping_address.index', compact("models", "page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Shipping Address';
        return view('admin.shipping_address.create', compact('page_title'));
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
            'postcode' => 'required|max:20',
        ]);

        $ShippingAddress = ShippingAddress::where('customer_id', Auth::user()->id)->where('id', $request->id)->first();
        if(empty($ShippingAddress)){
            $model = new ShippingAddress();
            $model->customer_id = Auth::user()->id;
            $model->first_name = $request->first_name;
            $model->last_name = $request->last_name;
            $model->company = $request->company;
            $model->country = $request->country;
            $model->street = $request->street;
            $model->town = $request->town;
            $model->postcode = $request->postcode;
            $model->save();
            return redirect()->route('shipping_address.index')->with('message', 'Shipping Address Added Successfully !'); 

        }else{
            /* Update Shipping Address */
            $update = ShippingAddress::where('customer_id', Auth::user()->id)->where('id', $request->id)->first();
            $update->customer_id = Auth::user()->id;
            $update->first_name = $request->first_name;
            $update->last_name = $request->last_name;
            $update->company = $request->company;
            $update->country = $request->country;
            $update->street = $request->street;
            $update->town = $request->town;
            $update->postcode = $request->postcode;
            $update->update();
            return redirect()->route('shipping_address.index')->with('message', 'Shipping Address Updated Successfully !');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = ShippingAddress::where('customer_id', Auth::user()->id)->where('id', $id)->first();
        $page_title = 'Show Shipping Address';
        return view('admin.shipping_address.show', compact('address', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipping = ShippingAddress::where('customer_id', Auth::user()->id)->where('id', $id)->first();
        $page_title = 'Edit Shipping Address';
        return view('admin.shipping_address.edit', compact('shipping', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'company' => 'required|max:100',
            'country' => 'required|max:20',
            'street' => 'required|max:100',
            'town' => 'required|max:100',
            'postcode' => 'required|max:100',
        ]);

        $update = ShippingAddress::where('customer_id', Auth::user()->id)->where('id', $id)->first();
        $update->customer_id = Auth::user()->id;
        $update->first_name = $request->first_name;
        $update->last_name = $request->last_name;
        $update->company = $request->company;
        $update->country = $request->country;
        $update->street = $request->street;
        $update->town = $request->town;
        $update->postcode = $request->postcode;
        $update->update();
        return redirect()->route('shipping_address.index')->with('message', 'Shipping Address Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = ShippingAddress::where('customer_id', Auth::user()->id)->where('id', $id)->first();
        if ($address) {
            $address->delete();
            return true;
        } else {
            return false;
        }
    }
}
