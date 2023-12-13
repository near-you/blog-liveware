<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'my_profession',
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

    public function skillTitle(): HasMany
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

    public function skill(): HasManyThrough
    {
        return $this->hasManyThrough(Skill::class, SkillTitle::class);
    }
}
