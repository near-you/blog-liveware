<?php

namespace App\Filament\Resources\Service\FactsResource\Pages;

use App\Filament\Resources\Service\FactsResource;
use App\Models\Service\Facts;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageFacts extends ManageRecords
{
    protected static string $resource = FactsResource::class;

    protected function getHeaderActions(): array
    {
        if (Facts::query()->count() < 3) {
            return [
                Actions\CreateAction::make()
                    ->createAnother(false),
            ];
        }
        return [];
    }
}
