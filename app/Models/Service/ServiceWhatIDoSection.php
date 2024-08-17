<?php

namespace App\Models\Service;

use App\Actions\GetImages;
use App\Models\Image;
use App\Traits\HandlesFileDeletion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceWhatIDoSection extends Model
{
    use HasFactory;
    use HandlesFileDeletion;

    protected $fillable = [
        'is_active',
        'title',
        'description',
    ];

    public function attachments(): HasOne
    {
        return $this->hasOne(Image::class);
    }

    public function getImage()
    {
        return (new GetImages())->handle($this->attachments);
    }

//    public static function boot()
//    {
//        parent::boot();
//
//        static::deleting(function ($serviceWhatIDoSection) {
//            $serviceWhatIDoSection->attachments()->delete();
//        });
//    }
}
