<?php

namespace App\Filament\Resources\About\AboutResource\Pages;

use App\Filament\Resources\About\AboutResource;
use Filament\Resources\Pages\EditRecord;

class EditAbout extends EditRecord
{
    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }
}
