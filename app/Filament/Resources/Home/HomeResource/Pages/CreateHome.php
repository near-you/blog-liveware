<?php

namespace App\Filament\Resources\Home\HomeResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Home\HomeResource;
use App\Models\Home\Home;

class CreateHome extends CreateRecord
{
    protected static string $resource = HomeResource::class;

//    protected function mutateFormDataBeforeCreate(array $data): array
//    {
//        $homeData = [
//            'name' => $data['name'],
//            'surname' => $data['surname'],
//            'short_description' => $data['short_description'],
//            'facebook_link' => $data['facebook_link'],
//            'twitter_link' => $data['twitter_link'],
//            'behance_link' => $data['behance_link'],
//            'linkedin_link' => $data['linkedin_link'],
//            'instagram_link' => $data['instagram_link'],
//        ];
//
//        $image = $data['homeImage'] ?? [];
//
//        unset($data['homeImage']);
//
//        return [
//            'home_data' => $homeData,
//            'homeImage' => $image,
//        ];
//    }
//
//    protected function handleRecordCreation(array $data): Model
//    {
//        $home = Home::create($data['home_data']);
//
//        if (!empty($data['homeImage'])) {
//            $home->homeImages()->create([
//                'image' => $data['homeImage'],
//            ]);
//        }
//
//        return $home;
//    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
