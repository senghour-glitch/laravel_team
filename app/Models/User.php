<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRole;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'profile_image',
        'location',
        'firebase_uid',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }
    public function isCustomer(): bool
    {
        return $this->role === UserRole::CUSTOMER;
    }
    public function isFarmer(): bool
    {
        return $this->role === UserRole::FARMER;
    }
    public function verifications()
    {
        return $this->hasMany(UserVerification::class);
    }
    public function sessions()
    {
        return $this->hasMany(UserSession::class);
    }
}
