<?php

namespace App\Console\Commands;

use App\Models\Other\Currency;
use App\Services\CurrencyService;
use Illuminate\Console\Command;

class UpdateCurrencyRates extends Command
{
    protected $signature = 'currency:update-rates';

    protected $description = 'Command description';

    protected CurrencyService $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        parent::__construct();
        $this->currencyService = $currencyService;
    }

    public function handle(): void
    {
        $this->info('Fetching currency exchange rates...');

        $rates = $this->currencyService->getExchangeRates();

        if ($rates) {
            foreach ($rates['rates'] as $code => $rate) {
                $currency = Currency::query()->where('code', $code)->first();
                if ($currency) {
                    $currency->exchange_rate = $rate;
                    $currency->save();
                }
            }

            $this->info('Currency exchange rates updated successfully.');
        } else {
            $this->error('Failed to fetch exchange rates.');
        }
    }
}
