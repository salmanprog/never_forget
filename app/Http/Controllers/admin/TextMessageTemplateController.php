<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextMessageTemplateController extends Controller
{
    /**
     * 30-Day text message templates (send every 3-5 days. Keep concise and friendly.)
     */
    protected static function templates(): array
    {
        return [
            [
                'day' => 1,
                'focus' => 'Welcome & Thank You',
                'body' => "Hi [Customer Name], thanks for reaching out to NEVER FORGET Appreciation! We'll email a few ideas shortly. – [Your Name]",
            ],
            [
                'day' => 3,
                'focus' => 'Friendly Check-In',
                'body' => "Hi [Customer Name], just checking in to see if you received our email with appreciation options. Would you like me to resend it? – [Your Name]",
            ],
            [
                'day' => 5,
                'focus' => 'Product Highlight',
                'body' => "We help businesses send cards & gifts that leave a lasting impression. Want a sample idea? – [Your Name]",
            ],
            [
                'day' => 7,
                'focus' => 'Milestones Check-In',
                'body' => "Any special birthdays or milestones coming up? We can help make them unforgettable. – [Your Name]",
            ],
            [
                'day' => 10,
                'focus' => 'Quick Quote Offer',
                'body' => "Would you like a quick quote or sample for your appreciation program? It only takes 2 minutes. – [Your Name]",
            ],
            [
                'day' => 12,
                'focus' => 'Call Follow-Up',
                'body' => "I tried giving you a quick call earlier – when's a good time to connect? – [Your Name]",
            ],
            [
                'day' => 15,
                'focus' => 'Success Story',
                'body' => "Our clients love the hand-signed cards we create. Want to see a sample? – [Your Name]",
            ],
            [
                'day' => 18,
                'focus' => 'Gentle Reminder',
                'body' => "Still interested in appreciation ideas? I can show you a few that fit any budget. – [Your Name]",
            ],
            [
                'day' => 20,
                'focus' => 'Event Check-In',
                'body' => "We make company birthdays & anniversaries simple. Would you like a preview? – [Your Name]",
            ],
            [
                'day' => 23,
                'focus' => 'Free Sample Offer',
                'body' => "Can we send you a complimentary sample card or small gift? – [Your Name]",
            ],
            [
                'day' => 25,
                'focus' => 'Easy Start',
                'body' => "Ready to start showing appreciation? I can send a short guide today. – [Your Name]",
            ],
            [
                'day' => 30,
                'focus' => 'Final Check-In / Close',
                'body' => "Thanks for staying in touch! Would you like to keep receiving updates on new gift options? – [Your Name]",
            ],
        ];
    }

    /**
     * List all text message templates (cards grid).
     */
    public function index()
    {
        $page_title = '30-Day Text Message Templates';
        $templates = static::templates();
        return view('admin.text-message-templates.index', compact('page_title', 'templates'));
    }

    /**
     * Show single text message template (copy to clipboard).
     */
    public function show($day)
    {
        $templates = static::templates();
        $template = collect($templates)->firstWhere('day', (int) $day);
        if (!$template) {
            abort(404);
        }
        $page_title = 'Day ' . $template['day'] . ' – ' . $template['focus'];
        return view('admin.text-message-templates.show', compact('page_title', 'template'));
    }
}
