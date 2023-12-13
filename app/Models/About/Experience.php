<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'experience_company',
        'experience_profession',
        'education_year_start',
        'education_year_finish',
    ];
}
