<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'percent',
        'skill_title_id',
    ];

    public function skillTitle(): HasMany
    {
        return $this->hasMany(SkillTitle::class);
    }
}
