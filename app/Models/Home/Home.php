<?php

namespace App\Models\Home;

use App\Actions\GetImages;
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
        return (new GetImages())->handle($this->image);
    }
}
