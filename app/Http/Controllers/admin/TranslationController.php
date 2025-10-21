<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\TranslationService;

class TranslationController extends Controller
{
    protected $translationService;
    
    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }
    
    public function index()
    {
        $languages = $this->translationService->getAvailableLanguages();
        return view('admin.translations.index', compact('languages'));
    }
    
    public function translate(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'target_language' => 'required|string|size:2',
        ]);
        
        $originalText = $request->input('text');
        $targetLanguage = $request->input('target_language');
        $translatedText = $this->translationService->translate($originalText, $targetLanguage);
        $languages = $this->translationService->getAvailableLanguages();
        
        return view('admin.translations.index', compact('originalText', 'translatedText', 'targetLanguage', 'languages'));
    }
    
    public function manageTranslations()
    {
        $defaultLocale = config('app.fallback_locale', 'en');
        $languages = $this->translationService->getAvailableLanguages();
        
        // Get all translation files
        $files = File::files(resource_path("lang/{$defaultLocale}"));
        $translations = [];
        
        foreach ($files as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $translations[$filename] = require($file);
        }
        
        return view('admin.translations.manage', compact('languages', 'translations', 'defaultLocale'));
    }
}