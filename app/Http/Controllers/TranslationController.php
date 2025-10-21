<?php

namespace App\Http\Controllers;

use App\Services\TranslationService;
use Illuminate\Http\Request;

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
        return view('translation.index', compact('languages'));
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

        return view('translation.index', compact('originalText', 'translatedText', 'targetLanguage', 'languages'));
    }
}
