<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image',
        'image_detailable_id',
        'image_detailable_type',
<<<<<<< HEAD
    ];

    protected $dates = [
        'deleted_at'
=======
>>>>>>> a
    ];

    public function image_detailable()
    {
        return $this->morphTo();
    }

    public function scopeByIds($query, $ids)
    {
        return $query->whereIn('id', $ids);
    }
}
