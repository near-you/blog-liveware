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
            ['code' => 'USD', 'name' => 'US Dollar', 'exchange_rate' => 1],
            ['code' => 'EUR', 'name' => 'Euro', 'exchange_rate' => 1],
            ['code' => 'UAH', 'name' => 'Hryvna', 'exchange_rate' => 1],
            ['code' => 'PLN', 'name' => 'Zloty', 'exchange_rate' => 1],
        ];

        foreach ($currencies as $currency) {
            Currency::query()->updateOrCreate(['code' => $currency['code']], $currency);
        }
    }
}
