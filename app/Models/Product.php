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

    public function getCateNameAttribute($value)
    {
        return $this->category->name;
    }

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

    public function rate()
    {
        return $this->hasOne(Rating::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function scopeByOption($query, $column)
    {
        return $query->join('options', function ($join) use ($column){
            $join->on('products.id', '=', 'options.product_id')
                ->where('options.deleted_at', null)
                ->whereJsonContains('options', [$column => 'on']);
        });
    }

}
