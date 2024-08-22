<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyService
{
    protected mixed $apiUrl;
    protected mixed $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.currency_api.url'); // URL до API
        $this->apiKey = config('services.currency_api.key'); // API ключ
    }

    public function getExchangeRates()
    {
        $response = Http::get($this->apiUrl, [
            'access_key' => $this->apiKey,
            'base' => 'EUR', // базова валюта
        ]);

        if ($response->successful()) {
            return $response->json(); // Повертає JSON з курсами валют
        }

        return null;
    }
}
