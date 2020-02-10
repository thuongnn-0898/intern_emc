<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'image',
        'shortText',
        'longText',
        'status',
        'quantity',
        'view',
        'category_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($products) {
            $products->option()->delete();
            foreach ($products->imageDetails()->get() as $product) {
                $product->delete();
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function imageDetails()
    {
        return $this->morphMany(ImageDetail::class, 'image_detailable');
    }

    public function option()
    {
        return $this->hasOne(Option::class);
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
