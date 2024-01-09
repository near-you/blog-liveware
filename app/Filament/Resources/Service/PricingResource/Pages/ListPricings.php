<?php

namespace App\Filament\Resources\Service\PricingResource\Pages;

use App\Filament\Resources\Service\PricingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPricings extends ListRecords
{
    protected static string $resource = PricingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
