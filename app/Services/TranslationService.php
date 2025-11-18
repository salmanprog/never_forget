<?php

namespace App\Services;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class TranslationService
{
    protected $cacheTime = 60 * 24 * 7; // 1 week
    protected $translators = [];

    /**
     * Get or create a translator instance for the given language pair
     */
    protected function getTranslator(string $sourceLanguage, string $targetLanguage)
    {
        $key = "{$sourceLanguage}-{$targetLanguage}";
        
        if (!isset($this->translators[$key])) {
            $tr = new GoogleTranslate();
            $tr->setSource($sourceLanguage);
            $tr->setTarget($targetLanguage);
            $this->translators[$key] = $tr;
        }
        
        return $this->translators[$key];
    }

    /**
     * Translate text from source language to target language
     */
    public function translate(string $text, string $targetLanguage = 'es', string $sourceLanguage = 'en')
    {
        // Don't translate empty strings
        if (empty(trim($text))) {
            return $text;
        }
        
        // Don't translate if source and target are the same
        if ($sourceLanguage === $targetLanguage) {
            return $text;
        }
        
        // Generate a cache key based on text and language pair
        $cacheKey = "translation_{$sourceLanguage}_{$targetLanguage}_" . md5($text);

        // Check if translation exists in cache
        return Cache::remember($cacheKey, $this->cacheTime, function () use ($text, $targetLanguage, $sourceLanguage) {
            try {
                $translator = $this->getTranslator($sourceLanguage, $targetLanguage);
                $translated = $translator->translate($text);
                
                // If translation failed or returned empty, return original text
                if (empty($translated)) {
                    Log::warning("Empty translation result for: " . substr($text, 0, 100) . "...");
                    return $text;
                }
                
                return $translated;
            } catch (\Exception $e) {
                Log::error("Translation error: " . $e->getMessage());
                return $text; // Return original text on error
            }
        });
    }

    /**
     * Get available languages
     */
    public function getAvailableLanguages()
    {
        return [
            'en' => 'English',
            'es' => 'Spanish',
            'fr' => 'French',
            'de' => 'German',
            'it' => 'Italian',
            'pt' => 'Portuguese',
            'zh' => 'Chinese',
            'ja' => 'Japanese',
            'ru' => 'Russian',
            'ar' => 'Arabic',
            'hi' => 'Hindi'
        ];
    }
}











