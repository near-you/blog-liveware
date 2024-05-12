<?php

namespace App\Actions;

use Illuminate\Support\Carbon;

class FilamentDateSelect
{
    public function handle(): array
    {
        $currentYear = Carbon::now()->year;
        $years = range($currentYear, $currentYear - 30);
        array_unshift($years, 'Now');

        return array_combine($years, $years);
    }
}