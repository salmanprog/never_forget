<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    /**
     * Templates landing: 3 options (Email, Text Messages, Phone Scripts).
     * Sales Person sees sales-person layout (no admin panel access).
     */
    public function index()
    {
        $page_title = 'Templates';
        $layout = auth()->user()->hasRole('Sales Person') ? 'layouts.sales-person.app' : 'layouts.admin.app';
        return view('admin.templates.index', compact('page_title', 'layout'));
    }

    /**
     * Text Messages templates page.
     */
    public function textMessages()
    {
        $page_title = 'Text Messages';
        return view('admin.templates.text-messages', compact('page_title'));
    }

    /**
     * Phone Scripts templates page.
     */
    public function phoneScripts()
    {
        $page_title = 'Phone Scripts';
        return view('admin.templates.phone-scripts', compact('page_title'));
    }
}
