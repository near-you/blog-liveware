<?php

namespace App\Models\Portfolio;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(PortfolioDetail::class, 'detail_id', 'id');
    }

    public function socialMedia(): HasMany
    {
        return $this->hasMany(PortfolioSocialMedia::class, 'social_media_id', 'id');
    }

    public function portfolioImage(): HasMany
    {
        return $this->hasMany(Image::class, 'portfolio_id', 'id');
    }
}
