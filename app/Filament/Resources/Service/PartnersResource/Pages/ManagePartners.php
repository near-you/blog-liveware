<?php

namespace App\Filament\Resources\Service\PartnersResource\Pages;

use App\Filament\Resources\Service\PartnersResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePartners extends ManageRecords
{
    protected static string $resource = PartnersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
