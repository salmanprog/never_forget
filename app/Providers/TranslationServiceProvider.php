<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TranslationService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TranslationService::class, function ($app) {
            return new TranslationService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Override Laravel's translation function to use our dynamic translator
        $this->app->extend('translator', function ($translator, $app) {
            // Add a custom method to the translator
            $translator->macro('translateDynamic', function ($key, $replace = [], $locale = null) use ($translator, $app) {
                $locale = $locale ?: App::getLocale();
                $defaultLocale = config('app.fallback_locale', 'en');
                
                // If we're using the default locale, just return the normal translation
                if ($locale === $defaultLocale) {
                    return $translator->get($key, $replace, $locale);
                }
                
                // Try to get the translation from Laravel's built-in system first
                $translation = $translator->get($key, $replace, $locale);
                
                // If the key was not found (it returns the key itself), use our dynamic translator
                if ($translation === $key && !is_array($key)) {
                    // Get the text in the default language
                    $defaultText = $translator->get($key, $replace, $defaultLocale);
                    
                    // If the default text is the same as the key, it means the key doesn't exist
                    // in the default language either, so just return it
                    if ($defaultText === $key) {
                        return $key;
                    }
                    
                    // Generate a cache key for this translation
                    $cacheKey = "translation_{$defaultLocale}_{$locale}_" . md5($defaultText);
                    
                    // Try to get from cache or translate dynamically
                    return Cache::remember($cacheKey, 60*24*7, function () use ($app, $defaultText, $locale) {
                        $translationService = $app->make(TranslationService::class);
                        return $translationService->translate($defaultText, $locale, config('app.fallback_locale', 'en'));
                    });
                }
                
                return $translation;
            });
            
            return $translator;
        });
        
        // Create a Blade directive for dynamic translation
        Blade::directive('_', function ($expression) {
            return "<?php echo app('translator')->translateDynamic($expression); ?>";
        });
    }
}

