<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $hidden = [
        'id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($categories) {
            foreach ($categories->products()->get() as $product) {
                $product->delete();
            }
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public static function getChildren($category){
        $ids = [];
        foreach ($category->children as $cat) {
            $ids[] = $cat->id;
            $ids = array_merge($ids, Category::getChildren($cat));
        }
        return $ids;
    }

    public function itSelf($id)
    {
        return $this->id == (int)$id;
    }
}
