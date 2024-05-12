<?php

namespace App\Actions;

class GetImages
{
    public function handle($image)
    {
        if (str_starts_with($image, 'http')) {
            return $image;
        }

        return '/storage/' . $image;
    }
}