<?php

namespace App\Filament\Resources\About\SkillTitleResource\Pages;

use App\Filament\Resources\About\SkillTitleResource;
use Filament\Resources\Pages\EditRecord;

class EditSkillTitle extends EditRecord
{
    protected static string $resource = SkillTitleResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }
}
