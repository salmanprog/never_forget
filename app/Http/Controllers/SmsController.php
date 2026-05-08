<?php

namespace App\Http\Controllers;

use App\Models\SmsLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Twilio\Rest\Client;
use App\Models\SmsReply;

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
     * Twilio webhook: handle incoming SMS replies from users.
     * Configure in Twilio Console: Phone Numbers > Your Number > Messaging > "A message comes in" webhook URL.
     */
    public function handleReply(Request $request)
    {
        $from = $request->input('From');   // User's phone (E.164)
        $to = $request->input('To');       // Your Twilio number
        $body = $request->input('Body');   // User's message
        $messageSid = $request->input('MessageSid');

        SmsReply::create([
            'from_number' => $from ?? '',
            'to_number' => $to,
            'body' => $body ?? '',
            'twilio_message_sid' => $messageSid,
        ]);

        // TwiML response - optionally send a confirmation back to the user
        $twiml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $twiml .= '<Response><Message>Thank you for your reply! We will get back to you soon.</Message></Response>';

        return response($twiml, 200)->header('Content-Type', 'application/xml');
    }

    /**
     * Get last 10 messages (sent + replies) for a phone number. Used by Send Message modal.
     */
    public function conversationHistory(Request $request)
    {
        $phone = $request->input('phone');
        if (!$phone) {
            return response()->json(['messages' => []]);
        }
        $normalized = $this->normalizePhone($phone);

        $sent = SmsLog::where('to_number', $normalized)
            ->selectRaw("body as text, created_at, 'out' as direction")
            ->get();

        $replies = SmsReply::where('from_number', $normalized)
            ->selectRaw("body as text, created_at, 'in' as direction")
            ->get();

        $merged = $sent->concat($replies)
            ->sortByDesc('created_at')
            ->take(10)
            ->values()
            ->map(function ($item) {
                return [
                    'text' => $item->text,
                    'at' => $item->created_at->format('M j, Y g:i A'),
                    'direction' => $item->direction,
                ];
            });

        return response()->json(['messages' => $merged->all()]);
    }

    /**
     * Initiate click-to-call via Twilio: call the logged-in agent first, then when they answer, connect to the customer.
     */
    public function initiateCall(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
        ]);

        $sid = config('services.twilio.account_sid');
        $token = config('services.twilio.auth_token');
        $from = config('services.twilio.from');

        if (!$sid || !$token || !$from) {
            return response()->json([
                'success' => false,
                'message' => 'Voice is not configured. Please set TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN, and TWILIO_FROM_NUMBER in .env',
            ], 500);
        }

        $customerPhone = $this->normalizePhone($request->phone);
        $agentPhone = $this->getAgentPhone();
        if (!$agentPhone) {
            return response()->json([
                'success' => false,
                'message' => 'No phone number to call you at. Add your phone in profile or set TWILIO_AGENT_PHONE in .env.',
            ], 422);
        }

        $dialToken = Str::random(32);
        Cache::put('twilio_dial_' . $dialToken, $customerPhone, now()->addMinutes(5));

        $twimlUrl = url()->route('twilio.voice.dial', ['token' => $dialToken]);

        try {
            $client = new Client($sid, $token);
            $client->calls->create($agentPhone, $from, [
                'url' => $twimlUrl,
                'method' => 'GET',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'You will be called at your number shortly. Answer to be connected to the customer.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to initiate call: ' . $e->getMessage(),
            ], 422);
        }
    }

    /**
     * TwiML endpoint for Twilio: when the agent answers, dial the customer and connect.
     * Called by Twilio (no auth). Token is one-time and stored in cache.
     */
    public function dialTwiml(Request $request)
    {
        $token = $request->query('token');
        if (!$token) {
            return response('<?xml version="1.0" encoding="UTF-8"?><Response><Say>Invalid request.</Say></Response>', 200)
                ->header('Content-Type', 'application/xml');
        }

        $customerPhone = Cache::pull('twilio_dial_' . $token);
        if (!$customerPhone) {
            return response('<?xml version="1.0" encoding="UTF-8"?><Response><Say>This link has expired or was already used.</Say></Response>', 200)
                ->header('Content-Type', 'application/xml');
        }

        $twiml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $twiml .= '<Response>';
        $twiml .= '<Say>Please hold while we connect you.</Say>';
        $twiml .= '<Dial>' . htmlspecialchars($customerPhone) . '</Dial>';
        $twiml .= '</Response>';

        return response($twiml, 200)->header('Content-Type', 'application/xml');
    }

    /**
     * Get the phone number to call for the agent (logged-in user or config fallback).
     */
    private function getAgentPhone(): ?string
    {
        $user = Auth::user();
        if ($user && !empty($user->phone)) {
            return $this->normalizePhone($user->phone);
        }
        $config = config('services.twilio.agent_phone');
        return $config ? $this->normalizePhone($config) : null;
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
