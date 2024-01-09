<?php

namespace App\Filament\Resources\Home\HomeResource\Pages;

use App\Filament\Resources\Home\HomeResource;
use App\Models\Home\Home;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomes extends ListRecords
{
    protected static string $resource = HomeResource::class;

    protected function getHeaderActions(): array
    {
        if (Home::query()->count() < 1) {
            return [
                Actions\CreateAction::make(),
            ];
        }
        return [];
    }
}
