<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    /**
     * 30-Day follow-up email templates for sales persons (NEVER FORGET Appreciation).
     */
    protected static function templates(): array
    {
        return [
            [
                'day' => 1,
                'subject' => 'Thank you for reaching out to NEVER FORGET',
                'focus' => 'Welcome & Thank You',
                'body' => "Hi [Customer Name],\n\nThank you for contacting NEVER FORGET Appreciation! We specialize in helping businesses and individuals express gratitude through personalized cards, flowers, and thoughtful gifts.\n\nI'd love to learn more about your goals and show how we can make appreciation effortless for you.\n\nBest regards,\n[Your Name]\n[Your Title]\nNEVER FORGET Appreciation",
            ],
            [
                'day' => 3,
                'subject' => 'Following up to see how we can assist you',
                'focus' => 'Friendly Check-In',
                'body' => "Hi [Customer Name],\n\nJust checking in to see if you had a chance to review what we offer. Our goal is to make showing appreciation easy and memorable.\n\nWould you like me to send our most popular appreciation packages or custom options?\n\nKind regards,\n[Your Name]",
            ],
            [
                'day' => 5,
                'subject' => "Here's what other companies are loving",
                'focus' => 'Product Highlight',
                'body' => "Hi [Customer Name],\n\nMany of our clients love our simple programs — birthday cards, thank-you baskets, or holiday gifts — all handled by us from start to finish.\n\nI can send you a quick sample lineup if you'd like.\n\nSincerely,\n[Your Name]",
            ],
            [
                'day' => 7,
                'subject' => "Let's personalize appreciation for your team or clients",
                'focus' => 'Relationship Builder',
                'body' => "Hi [Customer Name],\n\nAt NEVER FORGET, we believe every \"thank you\" should feel personal. Whether it's for your employees, customers, or partners, we tailor each gesture to fit your brand.\n\nWould you like to schedule a short call to discuss what fits your goals?\n\nWarmly,\n[Your Name]",
            ],
            [
                'day' => 10,
                'subject' => 'A small gesture can create a big impact',
                'focus' => 'Value Reminder',
                'body' => "Hi [Customer Name],\n\nDid you know that consistent appreciation can improve retention and loyalty by over 40%? That's why we make it easy to celebrate people who matter.\n\nWould you like a quote for a starter package?\n\nAppreciatively,\n[Your Name]",
            ],
            [
                'day' => 12,
                'subject' => 'Following up from my voicemail earlier',
                'focus' => 'Call Follow-Up',
                'body' => "Hi [Customer Name],\n\nI tried reaching out to share how we could help make appreciation simple for you. I'd love to learn what kind of recognition or gifts your company prefers.\n\nCan we schedule a 10-minute chat this week?\n\nBest,\n[Your Name]",
            ],
            [
                'day' => 15,
                'subject' => 'How one company made their employees feel unforgettable',
                'focus' => 'Success Story',
                'body' => "Hi [Customer Name],\n\nOne of our clients recently shared how our card-and-gift program increased morale and client referrals within a month.\n\nI'd love to help you create that same positive impact.\n\nWarm regards,\n[Your Name]",
            ],
            [
                'day' => 18,
                'subject' => 'Just checking in — still interested?',
                'focus' => 'Gentle Reminder',
                'body' => "Hi [Customer Name],\n\nI wanted to see if you're still considering adding an appreciation program. We're happy to tailor something that fits your budget and goals.\n\nNo pressure — just wanted to stay connected.\n\nSincerely,\n[Your Name]",
            ],
            [
                'day' => 20,
                'subject' => 'Any upcoming birthdays or milestones?',
                'focus' => 'Event Check-In',
                'body' => "Hi [Customer Name],\n\nAre there any upcoming company birthdays, anniversaries, or holidays? We can prepare personalized cards or gifts so you're ready ahead of time.\n\nWould you like us to put together a preview plan?\n\nBest,\n[Your Name]",
            ],
            [
                'day' => 23,
                'subject' => 'Would you like a complimentary sample?',
                'focus' => 'Free Sample Offer',
                'body' => "Hi [Customer Name],\n\nWe'd love for you to experience our quality firsthand. Would you like us to send a complimentary card or small sample gift? No obligation — just our way of saying thanks for considering us.\n\nAppreciatively,\n[Your Name]",
            ],
            [
                'day' => 25,
                'subject' => "It's easy to start showing appreciation today",
                'focus' => 'Easy Start Email',
                'body' => "Hi [Customer Name],\n\nWe make getting started simple — choose your budget, upload your recipient list, and we'll handle the rest. Everything ships directly from our central location in South Carolina.\n\nWould you like me to send a short setup guide?\n\nKind regards,\n[Your Name]",
            ],
            [
                'day' => 30,
                'subject' => 'Before I close your file — still open to staying in touch?',
                'focus' => 'Final Check-In / Close',
                'body' => "Hi [Customer Name],\n\nIt's been a pleasure staying in touch this month. Before I close your file, I wanted to check whether you'd like to keep your information active for future collaborations.\n\nIf now's not the right time, no worries — we'll always be here when you're ready to bring appreciation to life.\n\nThank you again,\n[Your Name]",
            ],
        ];
    }

    /**
     * List all email templates (cards grid).
     * Sales Person sees sales-person layout (no admin panel access).
     */
    public function index()
    {
        $page_title = '30-Day Email Templates';
        $templates = static::templates();
        $layout = auth()->user()->hasRole('Sales Person') ? 'layouts.sales-person.app' : 'layouts.admin.app';
        return view('admin.email-templates.index', compact('page_title', 'templates', 'layout'));
    }

    /**
     * Show single email template detail (subject + body, copy to clipboard).
     */
    public function show($day)
    {
        $templates = static::templates();
        $template = collect($templates)->firstWhere('day', (int) $day);
        if (!$template) {
            abort(404);
        }
        $page_title = 'Day ' . $template['day'] . ' – ' . $template['focus'];
        $layout = auth()->user()->hasRole('Sales Person') ? 'layouts.sales-person.app' : 'layouts.admin.app';
        return view('admin.email-templates.show', compact('page_title', 'template', 'layout'));
    }
}
