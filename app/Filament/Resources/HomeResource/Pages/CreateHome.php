<?php

namespace App\Filament\Resources\HomeResource\Pages;

use App\Filament\Resources\HomeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHome extends CreateRecord
{
    protected static string $resource = HomeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}