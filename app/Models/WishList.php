<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    //wishlist beLongTo a user 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //wishlist hasMany wishlsit_items
    public function wish_list_items()
    {
        return $this->hasMany(WishListItem::class);
    }
}
