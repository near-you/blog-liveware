<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'percent',
    ];

    public function skillTitle(): BelongsTo
    {
        return $this->belongsTo(SkillTitle::class);
    }
}
