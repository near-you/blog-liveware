<?php

namespace Database\Seeders;

use App\Models\Other\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        $currencies = [
            ['code' => 'EUR', 'name' => '€', 'exchange_rate' => 1],
            ['code' => 'GBP', 'name' => '£', 'exchange_rate' => 1],
            ['code' => 'USD', 'name' => '$', 'exchange_rate' => 1],
            ['code' => 'UAH', 'name' => '₴', 'exchange_rate' => 1],
            ['code' => 'PLN', 'name' => 'zł', 'exchange_rate' => 1],
        ];

        foreach ($currencies as $currency) {
            Currency::query()->updateOrCreate(['code' => $currency['code']], $currency);
        }
    }
}
