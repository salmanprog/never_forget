<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Auth;

class PaymentController extends Controller
{
    public function edit($order_number)
    {
        return view('website.paytroit');
        //after payment successfully
        session()->flash('success', 'Your order have been placed Successfully !');
        return redirect()->route('dashboard');
    }

    public function store(Request $request)
    {
        /* return $request; */
        return view('website.paytroit');
    }
}
