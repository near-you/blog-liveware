<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_name',
        'degree',
        'year_start',
        'year_finish',
    ];
}
