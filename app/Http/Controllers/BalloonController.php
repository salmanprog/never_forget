<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BalloonsCategory;
class BalloonController extends Controller
{
    public function index()
    {
        $balloons = BalloonsCategory::all();
        return view('website.shop', compact('balloons'));
    }
}
