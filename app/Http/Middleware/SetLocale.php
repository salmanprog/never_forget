<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user has selected a language
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } 
        // Check if locale is in URL (e.g., /es/about)
        elseif ($request->segment(1) && in_array($request->segment(1), config('app.available_locales', ['en']))) {
            $locale = $request->segment(1);
            Session::put('locale', $locale);
        } 
        // Default to browser's preferred language or app default
        else {
            $locale = $request->getPreferredLanguage(config('app.available_locales', ['en'])) ?? config('app.locale');
        }

        App::setLocale($locale);
        
        return $next($request);
    }
}