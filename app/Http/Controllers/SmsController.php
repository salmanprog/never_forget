<?php

namespace App\Http\Controllers;

use App\Models\SmsLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    /**
     * Send SMS via Twilio (called from MTS dashboard message modal).
     */
    public function send(Request $request)
    {
        
        $request->validate([
            'phone' => 'required|string',
            'message' => 'required|string|max:1600',
        ]);

        $phone = $this->normalizePhone($request->phone);
        $body = $request->message;

        $sid = config('services.twilio.account_sid');
        $token = config('services.twilio.auth_token');
        $from = config('services.twilio.from');

        if (!$sid || !$token || !$from) {
            return response()->json([
                'success' => false,
                'message' => 'SMS is not configured. Please set TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN, and TWILIO_FROM_NUMBER in .env',
            ], 500);
        }

        $log = SmsLog::create([
            'to_number' => $phone,
            'from_number' => $from,
            'body' => $body,
            'status' => 'pending',
            'sent_by_user_id' => Auth::id(),
        ]);

        try {
            $client = new Client($sid, $token);
            $message = $client->messages->create($phone, [
                'from' => $from,
                'body' => $body,
            ]);

            $log->update([
                'twilio_sid' => $message->sid,
                'status' => 'sent',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Message sent successfully.',
            ]);
        } catch (\Exception $e) {
            $log->update(['status' => 'failed']);

            return response()->json([
                'success' => false,
                'message' => 'Failed to send message: ' . $e->getMessage(),
            ], 422);
        }
    }

    /**
     * Normalize phone to E.164 for Twilio (e.g. +15551234567).
     */
    private function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/\D/', '', $phone);
        if (strlen($digits) === 10) {
            return '+1' . $digits;
        }
        if (strlen($digits) === 11 && str_starts_with($digits, '1')) {
            return '+' . $digits;
        }
        if (strlen($digits) >= 10) {
            return '+' . $digits;
        }
        return '+' . $digits;
    }
}
