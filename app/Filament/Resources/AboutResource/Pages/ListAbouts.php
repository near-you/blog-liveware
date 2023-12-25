<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use App\Models\About\About;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbouts extends ListRecords
{
    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        $about = About::query()->count();
        if (!$about >= 1) {
            return [ Actions\CreateAction::make() ];
        } else {
            return [];
        }

    }
}
