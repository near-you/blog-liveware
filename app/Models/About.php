<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'my_profession',
        'description',
        'birthday',
        'address',
        'email',
        'phone',
        'nationality',
        'study',
        'degree',
        'interest',
        'freelance',
    ];

    public function skill(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SkillTitle::class, 'about_id');
    }
}
