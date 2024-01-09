<?php

namespace App\Filament\Resources\About\SkillTitleResource\Pages;

use App\Filament\Resources\About\SkillTitleResource;
use App\Models\About\SkillTitle;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkillTitles extends ListRecords
{
    protected static string $resource = SkillTitleResource::class;

    protected function getHeaderActions(): array
    {
        if (SkillTitle::query()->count() < 2) {
            return [
                Actions\CreateAction::make(),
            ];
        } else {
            return [];
        }

    }
}
