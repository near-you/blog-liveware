<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'education_institution_name',
        'education_degree',
        'education_year_start',
        'education_year_finish',
    ];
}
