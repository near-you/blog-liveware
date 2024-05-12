<?php

namespace App\Models\Service;

use App\Actions\GetImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'url',
    ];

    public function getImage()
    {
        return (new GetImages)->handle($this->image);
    }
}
