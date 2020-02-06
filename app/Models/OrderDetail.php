<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'quantity',
        'discount',
        'order_id',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getProductNameAttribute($value)
    {
        return $this->product->name;
    }

}
