<?php

namespace App\Models\Service;

use App\Actions\GetImages;
use App\Models\Other\Image;
use App\Traits\HandlesFileDeletion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServicePartnerSection extends Model
{
    use HasFactory;
    use HandlesFileDeletion;

    protected $fillable = [
        'is_active',
        'partner_company_name',
        'partner_website_url',
    ];

    public function attachments(): HasOne
    {
        return $this->hasOne(Image::class);
    }

    public function getImage()
    {
        return (new GetImages())->handle($this->attachments);
    }
}
