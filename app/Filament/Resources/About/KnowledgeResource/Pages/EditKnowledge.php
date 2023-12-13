<?php

namespace App\Filament\Resources\About\KnowledgeResource\Pages;

use App\Filament\Resources\About\KnowledgeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKnowledge extends EditRecord
{
    protected static string $resource = KnowledgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
