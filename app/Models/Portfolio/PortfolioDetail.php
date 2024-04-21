<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer',
        'title',
        'description',
        'client',
        'category',
        'date',
    ];

    /*public function details(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }*/
}
