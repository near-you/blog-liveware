<?php

namespace App\Filament\Resources\Service\PartnersResource\Pages;

use App\Filament\Resources\Service\PartnersResource;
use App\Models\Service\Partners;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePartners extends ManageRecords
{
    protected static string $resource = PartnersResource::class;

    protected function getHeaderActions(): array
    {
        if (Partners::query()->count() < 8) {
            return [
                Actions\CreateAction::make(),
            ];
        }
        return [];
    }
}
