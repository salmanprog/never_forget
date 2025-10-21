<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class TranslateResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        // Only process HTML responses
        if ($response instanceof Response && 
            strpos($response->headers->get('Content-Type'), 'text/html') !== false) {
            
            $content = $response->getContent();
            
            // Use a simple regex to find and translate text
            // This is a basic example - you might need more sophisticated parsing
            $content = preg_replace_callback('/>([^<]+)</', function($matches) {
                $text = trim($matches[1]);
                if (!empty($text)) {
                    return '>' . _t($text) . '<';
                }
                return $matches[0];
            }, $content);
            
            $response->setContent($content);
        }
        
        return $response;
    }
}