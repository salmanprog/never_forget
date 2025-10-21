<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TranslationService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PreTranslateContent extends Command
{
    protected $signature = 'translate:content {--locale=all : The locale to translate to}';
    protected $description = 'Pre-translate content for faster page loads';

    protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        parent::__construct();
        $this->translationService = $translationService;
    }

    public function handle()
    {
        $locale = $this->option('locale');
        $locales = $locale === 'all' 
            ? array_keys($this->translationService->getAvailableLanguages()) 
            : [$locale];
        
        // Remove the default locale
        $defaultLocale = config('app.fallback_locale', 'en');
        $locales = array_filter($locales, function($l) use ($defaultLocale) {
            return $l !== $defaultLocale;
        });
        
        // Get all language files
        $langPath = resource_path('lang/' . $defaultLocale);
        if (!File::exists($langPath)) {
            $this->error("Default language files not found in {$langPath}");
            return 1;
        }
        
        $files = File::allFiles($langPath);
        
        $bar = $this->output->createProgressBar(count($files) * count($locales));
        $bar->start();
        
        foreach ($locales as $targetLocale) {
            foreach ($files as $file) {
                $relativePath = $file->getRelativePathname();
                $strings = require($file->getPathname());
                
                $this->translateArray($strings, $defaultLocale, $targetLocale, $relativePath);
                $bar->advance();
            }
        }
        
        $bar->finish();
        $this->info("\nTranslation completed!");
        
        return 0;
    }
    
    protected function translateArray($array, $sourceLocale, $targetLocale, $path, $prefix = '')
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->translateArray($value, $sourceLocale, $targetLocale, $path, $prefix . $key . '.');
            } else {
                $fullKey = $prefix . $key;
                $translated = $this->translationService->translate($value, $targetLocale, $sourceLocale);
                
                // Store the translation
                $this->storeTranslation($path, $fullKey, $translated, $targetLocale);
            }
        }
    }
    
    protected function storeTranslation($path, $key, $value, $locale)
    {
        $targetDir = resource_path("lang/{$locale}/" . dirname($path));
        if (!File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }
        
        $targetFile = resource_path("lang/{$locale}/" . $path);
        $content = [];
        
        if (File::exists($targetFile)) {
            $content = require($targetFile);
        }
        
        // Set nested keys
        $keys = explode('.', $key);
        $this->setNestedValue($content, $keys, $value);
        
        // Write to file
        $fileContent = "<?php\n\nreturn " . var_export($content, true) . ";\n";
        File::put($targetFile, $fileContent);
    }
    
    protected function setNestedValue(&$array, $keys, $value)
    {
        $key = array_shift($keys);
        
        if (empty($keys)) {
            $array[$key] = $value;
        } else {
            if (!isset($array[$key]) || !is_array($array[$key])) {
                $array[$key] = [];
            }
            
            $this->setNestedValue($array[$key], $keys, $value);
        }
    }
}