<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $email = null;

        if ($this->details['from'] == 'verify') {
            // Check if it's a Sales Person account and use appropriate template
            if (isset($this->details['account_type']) && $this->details['account_type'] == 'Sales Person') {
                $email = $this->subject('Welcome to Never Forget - Sales Person Account Created')->view('emails.verify-email-saleperson');
            } else {
                $email = $this->subject('Never Forget')->view('emails.verify-email');
            }
        } elseif ($this->details['from'] == 'password-reset') {
            $email = $this->subject('Reset Password Notification')->view('emails.password-reset');
        } elseif ($this->details['from'] == 'admin-password-reset') {
            $email = $this->subject('Reset Password Notification')->view('emails.password-reset');
        } elseif ($this->details['from'] == 'admin-new-booking') {
            $email = $this->subject('New Order Created')->view('emails.new-booking-admin-temp');
        } elseif ($this->details['from'] == 'career-response') {
            $email = $this->subject('Career Application Response')->view('emails.career-response');
        } elseif ($this->details['from'] == 'customer-new-booking') {
            $email = $this->subject('New Order Created')->view('emails.new-booking-customer-temp');
        } elseif ($this->details['from'] == 'share-email') {
            $email = $this->subject('Never Forget')->view('emails.share-email');
        } elseif ($this->details['from'] == 'career-application') {
            $email = $this->subject('Never Forget')->view('emails.career-application-email')->with('details', $this->details);
        }elseif ($this->details['from'] == 'user-inquiry') {
            $email = $this->subject($this->details['title'])
                        ->view('emails.user-inquiry')
                        ->with(['details' => $this->details['body']]);
        } elseif ($this->details['from'] == 'collaborate-quote') {
            $email = $this->subject($this->details['title'])
                        ->view('emails.collaborate-quote')
                        ->with(['details' => $this->details]);
        } elseif ($this->details['from'] == 'mts-dashboard-email') {
            $email = $this->subject($this->details['subject'])
                        ->view('emails.mts-dashboard-email')
                        ->with(['body' => $this->details['body'], 'recipientName' => $this->details['recipient_name'] ?? '']);
        } elseif ($this->details['from'] == 'e-card-confirmation') {
            $email = $this->subject('E-Card Request Received - NEVER FORGET')
                        ->view('emails.e-card-confirmation')
                        ->with([
                            'senderName' => $this->details['sender_name'] ?? '',
                            'occasion' => $this->details['occasion'] ?? '',
                            'recipientName' => $this->details['recipient_name'] ?? '',
                            'recipientEmailPhone' => $this->details['recipient_email_phone'] ?? '',
                            'sendDate' => $this->details['send_date'] ?? '',
                            'sendTime' => $this->details['send_time'] ?? '',
                            'cardStyle' => $this->details['card_style'] ?? '',
                            'ecardCategoryTitle' => $this->details['ecard_category_title'] ?? '',
                        ]);
        } elseif ($this->details['from'] == 'travel-experience-confirmation') {
            $email = $this->subject('Travel & Experience Inquiry Received - NEVER FORGET')
                        ->view('emails.travel-experience-confirmation')
                        ->with([
                            'name' => $this->details['name'] ?? '',
                            'email' => $this->details['email'] ?? '',
                            'phone' => $this->details['phone'] ?? '',
                            'inquiry_message' => $this->details['message'] ?? '',
                        ]);
        } elseif ($this->details['from'] == 'quality-logo-confirmation') {
            $email = $this->subject('Quality Logo Request Received - NEVER FORGET')
                        ->view('emails.quality-logo-confirmation')
                        ->with([
                            'senderName' => $this->details['name'] ?? '',
                            'product' => $this->details['product'] ?? '',
                            'email' => $this->details['email'] ?? '',
                            'phone' => $this->details['phone'] ?? '',
                            'inquiry_message' => $this->details['message'] ?? '',
                        ]);
        } elseif ($this->details['from'] == 'balloon-confirmation') {
            $email = $this->subject('Balloon Enquiry Received - NEVER FORGET')
                        ->view('emails.balloon-confirmation')
                        ->with([
                            'senderName' => $this->details['sender_name'] ?? '',
                            'email' => $this->details['email'] ?? '',
                            'phone' => $this->details['phone'] ?? '',
                            'inquiry_message' => $this->details['message'] ?? '',
                            'items_summary' => $this->details['items_summary'] ?? '',
                        ]);
        } elseif ($this->details['from'] == 'perfect-gift-confirmation') {
            $email = $this->subject('Perfect Gifts Enquiry Received - NEVER FORGET')
                        ->view('emails.perfect-gift-confirmation')
                        ->with([
                            'senderName' => $this->details['sender_name'] ?? '',
                            'email' => $this->details['email'] ?? '',
                            'phone' => $this->details['phone'] ?? '',
                            'business_type_label' => $this->details['business_type_label'] ?? '',
                            'inquiry_message' => $this->details['message'] ?? '',
                        ]);
        } elseif ($this->details['from'] == 'greetings-appreciation-confirmation') {
            $email = $this->subject('Greetings & Appreciation Enquiry Received - NEVER FORGET')
                        ->view('emails.greetings-appreciation-confirmation')
                        ->with([
                            'senderName' => $this->details['sender_name'] ?? '',
                            'email' => $this->details['email'] ?? '',
                            'phone' => $this->details['phone'] ?? '',
                            'inquiry_message' => $this->details['message'] ?? '',
                            'items_summary' => $this->details['items_summary'] ?? '',
                            'specify_type' => $this->details['specify_type'] ?? null,
                        ]);
        }

        if (
            isset($this->details['front_images']) && is_array($this->details['front_images']) ||
            isset($this->details['back_images']) && is_array($this->details['back_images'])
        ) {
            // Attach all front images
            if (!empty($this->details['front_images'])) {
                foreach ($this->details['front_images'] as $path) {
                    $absolutePath = public_path('storage/' . $path);
                    if (file_exists($absolutePath)) {
                        $email->attach($absolutePath, [
                            'as' => basename($path),
                            'mime' => 'image/png',
                        ]);
                    } else {
                        \Log::warning("Front image not found: " . $absolutePath);
                    }
                }
            }

            if (!empty($this->details['back_images'])) {
                foreach ($this->details['back_images'] as $path) {
                    $absolutePath = public_path('storage/' . $path);
                    if (file_exists($absolutePath)) {
                        $email->attach($absolutePath, [
                            'as' => basename($path),
                            'mime' => 'image/png',
                        ]);
                    } else {
                        \Log::warning("Back image not found: " . $absolutePath);
                    }
                }
            }
        }

        return $email;
    }
}
