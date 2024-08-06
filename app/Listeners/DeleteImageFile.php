<?php

namespace App\Listeners;

use App\Events\ImageDeleted;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteImageFile
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ImageDeleted $event): void
    {
        Storage::delete('public/' . $event->filePath);
    }
}
