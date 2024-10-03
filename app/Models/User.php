<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //accesor or getter
    public function getUsernameAttribute($value)
    {
        return ucfirst($value);
    }

    //mutator or setter
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = ucfirst($value);
    }

    public function getFullnameAttribute()
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    //user hasone wishlist
    public function wish_list()
    {
        return $this->hasOne(WishList::class);
    }

    // a user  hasmany orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
    // user has many addresses

    public function user_addresses()
    {
        return $this->hasMany(UserAddress::class, 'user_id');
    }

    // user has many otps
    public function otps()
    {
        return $this->hasMany(Otp::class, 'user_id');
    }
}
