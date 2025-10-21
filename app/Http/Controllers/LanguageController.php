<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function switchLang(Request $request, $locale)
    {
        // Check if the locale is supported
        if (in_array($locale, config('app.available_locales', ['en']))) {
            Session::put('locale', $locale);
        }
        
        return redirect()->back();
    }
}