<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait Translatable
{
    public function translate($field)
    {
        $locale = App::getLocale();
        $defaultLocale = config('app.fallback_locale', 'en');
        
        // If we're using the default locale, just return the field
        if ($locale === $defaultLocale) {
            return $this->$field;
        }
        
        // Try to get the translation
        return _t($this->$field);
    }
}