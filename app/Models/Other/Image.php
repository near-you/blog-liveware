<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image_url'];

//    public function home(): BelongsTo
//    {
//        return $this->belongsTo(Home::class);
//    }
}
