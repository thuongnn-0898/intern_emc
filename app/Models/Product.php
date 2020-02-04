<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image',
        'shortDesc',
        'longDesc',
        'status',
        'quantity',
        'view',
        'category_id',
    ];

    public function imageDetails()
    {
        return $this->morphMany(ImageDetail::class, 'image_detailable');
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rates()
    {
        return $this->hasMany(Rating::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
