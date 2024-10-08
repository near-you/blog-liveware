<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFunFactsSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
        'fact_count',
        'fact_title',
    ];
}
