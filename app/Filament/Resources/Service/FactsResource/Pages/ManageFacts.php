<?php

namespace App\Filament\Resources\Service\FactsResource\Pages;

use App\Filament\Resources\Service\FactsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageFacts extends ManageRecords
{
    protected static string $resource = FactsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
