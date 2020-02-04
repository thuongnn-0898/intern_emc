<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'options',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected $casts = [
        'options' => 'array'
    ];
}
