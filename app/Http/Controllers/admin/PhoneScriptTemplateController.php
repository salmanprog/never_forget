<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneScriptTemplateController extends Controller
{
    /**
     * 30-Day phone script templates (use depending on stage. Each call = 2-3 minutes.)
     */
    protected static function templates(): array
    {
        return [
            [
                'day' => 1,
                'focus' => 'Welcome & Qualify',
                'body' => "Hi [Customer Name], this is [Your Name] with NEVER FORGET Appreciation. I saw your request come through — thank you for reaching out! I'd love to learn more about what kind of appreciation or recognition you're looking for. Can I ask a few quick questions?",
            ],
            [
                'day' => 3,
                'focus' => 'Follow-Up',
                'body' => "Just following up to make sure you received my email and sample options. Did you have a chance to look them over?",
            ],
            [
                'day' => 5,
                'focus' => 'Understand Focus',
                'body' => "I wanted to understand whether your focus is on employee recognition, client appreciation, or both, so I can tailor options for you.",
            ],
            [
                'day' => 10,
                'focus' => 'Starter Options',
                'body' => "A lot of companies start with birthdays or thank-you cards and grow from there. Would something like that fit your goals?",
            ],
            [
                'day' => 12,
                'focus' => 'Schedule Call',
                'body' => "I can show you a few ideas in a short call or Zoom meeting this week. Would [day/time] work for you?",
            ],
            [
                'day' => 15,
                'focus' => 'Discover Current Practice',
                'body' => "I enjoy hearing how companies celebrate their teams. What's one thing you're currently doing that we could help enhance?",
            ],
            [
                'day' => 18,
                'focus' => 'Gentle Check-Back',
                'body' => "Just wanted to check back — no rush — but I'd love to help you plan something meaningful for your staff or clients.",
            ],
            [
                'day' => 20,
                'focus' => 'Upcoming Events',
                'body' => "Do you have any upcoming birthdays or events? We can help get everything ready ahead of time.",
            ],
            [
                'day' => 23,
                'focus' => 'Sample Offer',
                'body' => "We'd love to send a sample so you can see our quality firsthand. Would you prefer a card or a small gift sample?",
            ],
            [
                'day' => 25,
                'focus' => 'Onboarding Nudge',
                'body' => "We're onboarding a few new clients this week, and I'd love to include your company. Should I send over the setup details?",
            ],
            [
                'day' => 30,
                'focus' => 'Final Thank You / Close',
                'body' => "Hi [Customer Name], just wanted to thank you for staying in touch this month. If now's not the right time, may I follow up in the future?",
            ],
        ];
    }

    /**
     * List all phone script templates (cards grid).
     */
    public function index()
    {
        $page_title = '30-Day Phone Script Templates';
        $templates = static::templates();
        return view('admin.phone-script-templates.index', compact('page_title', 'templates'));
    }

    /**
     * Show single phone script template (copy to clipboard).
     */
    public function show($day)
    {
        $templates = static::templates();
        $template = collect($templates)->firstWhere('day', (int) $day);
        if (!$template) {
            abort(404);
        }
        $page_title = 'Day ' . $template['day'] . ' – ' . $template['focus'];
        return view('admin.phone-script-templates.show', compact('page_title', 'template'));
    }
}
