<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HandlesFileDeletion
{
    protected static function bootHandlesFileDeletion(): void
    {
        static::deleting(function ($record) {
            $record->load('attachments');
            $record->deleteAttachedFiles();
        });
    }

    public function deleteAttachedFiles(): void
    {
//        if ($this->relationLoaded('attachments') && $this->attachments) {
//            Storage::disk('public')->delete($this->attachments->image_url);
//            $this->attachments()->delete();
//        }

        $attachment = $this->attachments()->first();

        if ($attachment) {
            if (Storage::exists('public/' . $attachment->image_url)) {
                Storage::delete('public/' . $attachment->image_url); // Видалення файла
            }

//            $attachment->delete(); // Видалення запису з таблиці `images`
        }
    }
}
