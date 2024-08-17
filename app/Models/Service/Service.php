<?php

namespace App\Models\Service;

use App\Filament\Resources\Service\ServiceResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['is_active'];

    public function serviceWhatIDoSection(): HasMany
    {
        return $this->hasMany(ServiceWhatIDoSection::class, 'service_id', 'id');
    }

    public function servicePartnerSection(): HasMany
    {
        return $this->hasMany(ServicePartnerSection::class, 'service_id', 'id');
    }

    public function serviceFunFactSection(): HasMany
    {
        return $this->hasMany(ServiceFunFactsSection::class, 'service_id', 'id');
    }

    public function servicePricingSection(): HasMany
    {
        return $this->hasMany(ServicePricingSection::class, 'service_id', 'id');
    }
}
