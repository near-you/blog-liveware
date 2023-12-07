<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'short_description',
        'image',
        'facebook_link',
        'twitter_link',
        'behance_link',
        'linkedin_link',
        'instagram_link',
    ];

    public function getImage()
    {
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return '/storage/'.$this->image;
    }
}
