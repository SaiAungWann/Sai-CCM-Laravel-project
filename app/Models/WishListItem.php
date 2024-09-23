<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishListItem extends Model
{
    use HasFactory;

    //wishlist_items BeLongTo wishlist 
    public function wish_list()
    {
        return $this->belongsTo(WishList::class);
    }
    //wishlist_items BeLongTo product 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
