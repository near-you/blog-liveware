<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PricingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'item_is_active',
    ];

    public function pricing(): BelongsTo
    {
        return $this->belongsTo(Pricing::class);
    }
}
