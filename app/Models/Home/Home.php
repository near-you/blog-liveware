<?php

namespace App\Models\Home;

use App\Actions\GetImages;
use App\Models\Other\Image;
use App\Traits\HandlesFileDeletion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Home extends Model
{
    use HasFactory;
    use HandlesFileDeletion;

    protected $fillable = [
        'name',
        'surname',
        'short_description',
        'facebook_link',
        'twitter_link',
        'behance_link',
        'linkedin_link',
        'instagram_link',
    ];

    public function attachments(): HasOne
    {
        return $this->hasOne(Image::class);
    }

    public function getImage()
    {
        return (new GetImages())->handle($this->attachments);
    }
}
