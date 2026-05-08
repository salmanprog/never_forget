<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Twilio\Rest\Client;

class TwilioCheckCredentials extends Command
{
    protected $signature = 'twilio:check';
    protected $description = 'Verify Twilio Account SID and Auth Token (no SMS sent).';

    public function handle(): int
    {
        $sid = config('services.twilio.account_sid');
        $token = config('services.twilio.auth_token');

        if (!$sid || !$token) {
            $this->error('TWILIO_ACCOUNT_SID or TWILIO_AUTH_TOKEN is missing in .env');
            return 1;
        }

        $this->info('Checking Twilio credentials...');
        $this->line('Account SID: ' . substr($sid, 0, 6) . '...' . substr($sid, -4));

        try {
            $client = new Client($sid, $token);
            $account = $client->api->v2010->accounts($sid)->fetch();
            $this->info('OK – Credentials are valid. Account: ' . $account->friendlyName);
            return 0;
        } catch (\Exception $e) {
            $this->error('Twilio rejected the credentials: ' . $e->getMessage());
            $this->line('');
            $this->line('Fix: In https://console.twilio.com copy the current Account SID and Auth Token.');
            $this->line('If you ever clicked "Regenerate" on the Auth Token, the old token no longer works.');
            return 1;
        }
    }
}
