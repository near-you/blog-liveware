<?php

namespace App\Actions;

class GetImages
{
    public function handle($attachments)
    {
        // foreach ($attachments as $attachment) {
        //     dd($attachment->image);
        //     if (str_starts_with($attachment->image, 'http')) {
        //         return $attachment->image;
        //     }

        //     return '/storage/' . $attachment->image;
        // }


        if (str_starts_with($attachments->image, 'http')) {
            return $attachments->image;
        }

        return '/storage/' . $attachments->image;
    }
}
