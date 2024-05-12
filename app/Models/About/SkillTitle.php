<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SkillTitle extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function skill(): HasMany
    {
        return $this->hasMany(Skill::class);
    }
}
