<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $fillable = [
        'address',
        'state',
        'phone',
        'email',
        'amout',
        'description',
        'status',
    ];

    protected $hidden = [
        'amout',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsPending($query)
    {
        return $query->where('status', OrderStatus::Pendding);
    }
}
