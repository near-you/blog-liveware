<?php

namespace App\Models\Service;

use App\Actions\GetImages;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhatIDo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
    ];

    public function shortBody($words = 30): string
    {
        return Str::words($this->body, $words);
    }

    public function getImage()
    {
        return (new GetImages())->handle($this->image);
    }
}
