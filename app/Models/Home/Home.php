<?php

namespace App\Models\Home;

use App\Models\Image;
use App\Actions\GetImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Request;

class Home extends Model
{
    use HasFactory;

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
        return $this->hasOne(Image::class, 'home_id', 'id');
    }

    public function getImage()
    {
        return (new GetImages())->handle($this->attachments);
    }
}
