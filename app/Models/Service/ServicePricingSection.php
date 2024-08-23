<?php

namespace App\Models\Service;

use App\Models\Other\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServicePricingSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'pricing_section_price',
        'currency_id',
        'pricing_section_plan',
        'pricing_section_popular',
        'pricing_section_purchase_url',
    ];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function pricingItems(): HasMany
    {
        return $this->hasMany(ServicePricingItems::class);
    }

}
