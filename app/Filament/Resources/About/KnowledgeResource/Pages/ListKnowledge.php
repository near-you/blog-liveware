<?php

namespace App\Filament\Resources\About\KnowledgeResource\Pages;

use App\Filament\Resources\About\KnowledgeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKnowledge extends ListRecords
{
    protected static string $resource = KnowledgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
