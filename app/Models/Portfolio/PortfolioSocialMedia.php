<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'youtube',
        'vimeo',
        'soundcloud',
        'other',
    ];
}
