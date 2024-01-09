<?php

namespace App\Models\Service;

use App\Models\Service\PricingItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'currency',
        'plan',
        'popular',
    ];

    public function pricingItem(): HasMany
    {
        return $this->hasMany(PricingItem::class);
    }
}
