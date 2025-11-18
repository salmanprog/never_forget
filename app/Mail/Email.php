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
            $email = $this->subject('Never Forget')->view('emails.verify-email');
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
