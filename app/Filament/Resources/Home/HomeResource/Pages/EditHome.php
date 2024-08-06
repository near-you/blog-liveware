<?php

namespace App\Filament\Resources\Home\HomeResource\Pages;

use App\Filament\Resources\Home\HomeResource;
use App\Models\Home\Home;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EditHome extends EditRecord
{
    protected static string $resource = HomeResource::class;

    // protected function mutateFormDataBeforeSave(array $data): array
    // {
    //     $homeData = [
    //         'name' => $data['name'],
    //         'surname' => $data['surname'],
    //         'facebook_link' => $data['facebook_link'],
    //         'twitter_link' => $data['twitter_link'],
    //         'behance_link' => $data['behance_link'],
    //         'linkedin_link' => $data['linkedin_link'],
    //         'instagram_link' => $data['instagram_link'],
    //     ];

    //     $attachments = $data['attachments'] ?? [];

    //     // Видаляємо файли з основного масиву даних, щоб не було конфлікту під час створення Post
    //     unset($data['attachments']);

    //     return [
    //         'home_data' => $homeData,
    //         'attachments' => $attachments,
    //     ];
    // }

    // protected function handleRecordUpdate($record, array $data): Model
    // {
    //     if($record->attachments) {
    //         foreach ($record->attachments as $attachment) {
    //             dd($attachment->image);
    //             Storage::delete('public/' . $attachment->image);
    //         }

    //         $record->attachments()->delete();
    //     }

    //     $record->update($data['home_data']);

    //     if (!empty($data['attachments'])) {
    //         $record->attachments()->create([
    //             'image' => $data['attachments'],
    //         ]);
    //     }

    //     return $record;
    // }

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
