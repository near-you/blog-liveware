<?php

namespace App\Models;

use App\Models\Home\Home;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image_url'];

//    public function home(): BelongsTo
//    {
//        return $this->belongsTo(Home::class);
//    }
}
