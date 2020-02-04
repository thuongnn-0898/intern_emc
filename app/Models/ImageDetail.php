<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageDetail extends Model
{
    protected $fillable = [
        'image',
    ];

    public function image_detailable()
    {
        return $this->morphTo();
    }
}
