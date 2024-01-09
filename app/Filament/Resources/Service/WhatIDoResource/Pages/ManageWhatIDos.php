<?php

namespace App\Filament\Resources\Service\WhatIDoResource\Pages;

use App\Filament\Resources\Service\WhatIDoResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWhatIDos extends ManageRecords
{
    protected static string $resource = WhatIDoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->createAnother(false),
        ];
    }
}
