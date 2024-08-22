<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePricingSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_price',
        'service_currency',
        'service_plan',
        'service_popular',
        'service_purchase_url',
    ];
}
