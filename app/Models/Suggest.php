<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image',
        'message',
        'user_id',
        'status',
    ];

    public function imageDetails()
    {
        return $this->morphMany(ImageDetail::class, 'image_detailable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
