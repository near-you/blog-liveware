<?php

namespace App\Filament\Resources\Service\PricingResource\Pages;

use App\Filament\Resources\Service\PricingResource;
use App\Models\Service\Pricing;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPricings extends ListRecords
{
    protected static string $resource = PricingResource::class;

    protected function getHeaderActions(): array
    {
        if (Pricing::query()->count() < 3) {
            return [
                Actions\CreateAction::make(),
            ];
        }
        return [];
    }
}
