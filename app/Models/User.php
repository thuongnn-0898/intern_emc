<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\{UserRole, UserStatus};

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function suggests()
    {
        return $this->hasMany(Suggest::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function isAdmin()
    {
        return $this->role == UserRole::Admin;
    }

    public function isActive()
    {
        return $this->status == UserStatus::Active;
    }

    public function scopeGetUser($query)
    {
        return $query->where('role', UserRole::User);
    }

    public function getRole()
    {
        return UserRole::getDescription($this->role);
    }

    public function getStatus()
    {
        return UserStatus::getDescription($this->status);
    }

    public function imageDefault()
    {

        if($this->profile->image)

            return \Config::get('settings.avaDefault');

        return 'avatars/'.$this->profile->avatar;
    }
}
