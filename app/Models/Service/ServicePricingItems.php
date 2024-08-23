<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePricingItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'item_is_active',
    ];
}
