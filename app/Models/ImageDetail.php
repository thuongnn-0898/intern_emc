<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageDetail extends Model
{
    protected $fillable = [
        'image',
        'image_detailable_id',
        'image_detailable_type',
    ];

    public function image_detailable()
    {
        return $this->morphTo();
    }
}
