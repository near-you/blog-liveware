<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SkillTitle extends Model
{
    use HasFactory;

    protected $fillable = ['skill_title', 'about_id'];

//    public function aboutSkill(): HasOne
//    {
//        return $this->hasOne(About::class);
//    }
}
