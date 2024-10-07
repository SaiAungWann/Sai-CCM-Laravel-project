<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\WishList;
use App\Models\WishListItem;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function index()
    {

        return view('wishlist', [
            'title' => 'Wishlist',
        ]);
    }
    public function store(Product $product)
    {
        if (!auth()->user()->wish_list) {
            $wish_list = new WishList();
            $wish_list->user_id = auth()->id();
            $wish_list->save();
        }

        $wish_list = auth()->user()->wish_list;

        $wish_list_items = new WishListItem();
        $wish_list_items->wish_list_id = $wish_list->id;
        $wish_list_items->product_id = $product->id;
        $wish_list_items->save();

        return back();
    }

    public function show(WishList $wishList, User $user)
    {

        return view('userProfile.userWishlist', [
            'title' => 'Wishlist',
            'wishList' => $wishList,
            'user' => $user
        ]);
    }

    public function destroy(WishListItem $wishListItem)
    {
        $wishListItem->delete();
        return back();
    }
    public function destroyAll(WishList $wishList)
    {
        $wishList->delete();
        return back();
    }
}
