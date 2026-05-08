<?php

namespace App\Services;

use TaxJar\Client as TaxJarClient;
use Cart;
use Exception;

class TaxJarService
{
    protected $client;

    public function __construct()
    {
        $this->client = TaxJarClient::withApiKey(
            "fc0781067805500977ed365475b0f137"
        );
    }

    public function calculateSalesTax(
        $fromCountry, $fromState, $fromZip, $fromCity,
        $toCountry, $streetAddress, $toState, $toZip, $toCity,
        $amount, $shipping
    ) {
        try {
            return $this->client->taxForOrder([
                'from_country' => $fromCountry,
                'from_state'   => $fromState,
                'from_zip'     => $fromZip,
                'from_city'    => $fromCity,
                'to_country'   => $toCountry,
                'to_state'     => $toState,
                'to_zip'       => trim($toZip),
                'to_city'      => trim($toCity),
                'to_street'    => trim($streetAddress),
    
                'amount'       => $amount,
                'shipping'     => $shipping,
            ]);
        } catch (\Exception $e) {
            \Log::error('TaxJar error: '.$e->getMessage());
            return null;
        }
    }
    
}
