<?php

namespace App\Models\About;

use App\Actions\GetImages;
use App\Models\Image;
use App\Traits\HandlesFileDeletion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class About extends Model
{
    use HasFactory;
    use HandlesFileDeletion;

    protected $fillable = [
        'profession',
        'image',
        'description',
        'date_of_birth',
        'age',
        'address',
        'email',
        'phone',
        'nationality',
        'study',
        'degree',
        'interest',
        'freelance',
    ];

    public function skillTitles(): HasMany
    {
        return $this->hasMany(SkillTitle::class);
    }

    public function knowledge(): HasMany
    {
        return $this->hasMany(Knowledge::class);
    }

    public function interest(): HasMany
    {
        return $this->hasMany(Interest::class);
    }

    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function experience(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function attachments(): HasOne
    {
        return $this->hasOne(Image::class);
    }

    public function getImage()
    {
        return (new GetImages())->handle($this->attachments);
    }
}
