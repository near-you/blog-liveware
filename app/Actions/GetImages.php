<?php

namespace App\Actions;

use function PHPUnit\Framework\isNull;

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


        if (is_null($attachments)) {
            return '';
        } else {
            if (str_starts_with($attachments->image_url, 'http')) {
                return $attachments->image_url;
            }

            return '/storage/' . $attachments->image_url;
        }
    }
}
