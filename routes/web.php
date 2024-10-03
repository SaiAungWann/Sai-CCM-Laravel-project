<?php

use App\Http\Controllers\AdminDashBoardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\EmailConrtoller;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\UserAddressController;
use App\Http\Middleware\MustBeLoginUser;
use App\Models\Otp;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

// Admin Pannel
Route::get('/admin/dashBoard', [AdminDashBoardController::class, "index"]);
// Route::get('/admin', [AdminController::class, "index"]);
Route::get('/admin/ordersList', [OrderController::class, "index"]);
Route::get('/admin/order/{order}/show', [OrderController::class, "show"]);
Route::put('/admin/order/{order}/update', [OrderController::class, "update"]);

Route::get('/admin/login', [AdminDashBoardController::class, "login"]);
Route::get('/admin/products', [ProductController::class, "admin_product"]);
Route::get('/admin/product/create', [ProductController::class, "create"]);
Route::post('/admin/product/create', [ProductController::class, "adminStoreProduct"]);
Route::get('/admin/product/{product}/edit', [ProductController::class, 'edit']);
Route::put('/admin/product/{product}/update', [ProductController::class, "update"]);
Route::delete('/admin/product/{product}/delete', [ProductController::class, "destroy"]);

Route::get('/admin/categories', [CategoryController::class, "adminCategory"]);
Route::get('/admin/category/create', [CategoryController::class, "addCategory"]);
Route::post('/admin/category/create', [CategoryController::class, "store"]);
Route::get('/admin/category/{category}/edit', [CategoryController::class, "edit"]);
Route::put('/admin/category/{category}/update', [CategoryController::class, "update"]);
Route::delete('/admin/category/{category}/delete', [CategoryController::class, "destroy"]);

Route::get('/admin/brands', [ProductBrandController::class, "index"]);
Route::get('/admin/brand/create', [ProductBrandController::class, "create"]);
Route::post('/admin/brand/create', [ProductBrandController::class, "store"]);
Route::get('/admin/brand/{brand}/edit', [ProductBrandController::class, "edit"]);
Route::put('/admin/brand/{brand}/update', [ProductBrandController::class, "update"]);
Route::delete('/admin/brand/{brand}/delete', [ProductBrandController::class, "destroy"]);



Route::get('/admin/account', [AdminDashBoardController::class, "adminAccount"]);

// User Pannel 
Route::get('/', [ProductController::class, "index"])->name('home');

Route::get('/product-details/{product}', [ProductController::class, "show"]);
Route::get('/store', [ProductController::class, "store"]);
Route::get('/store/search', [ProductController::class, "search"]);
Route::get('/categories/{category:name}/show', [CategoryController::class, "index"]);
Route::get('/categoryCollections', [CategoryController::class, "allCategories"])->name('categoryCollections');

Route::get('/login', [LoginController::class, "create"]);

Route::get('/register', [RegisterController::class, "create"]);

Route::post('/login', [LoginController::class, "show"]);
Route::post('/register', [RegisterController::class, "store"]);

Route::post('/logout', [LogOutController::class, 'destory']);

Route::get('/user/{user}/profile', [UserController::class, "show"])->middleware(MustBeLoginUser::class);
Route::get('/user/{user}/profile/order', [UserController::class, "showOrders"])->middleware(MustBeLoginUser::class);

Route::get('/checkout', [CheckoutController::class, "index"])->middleware(MustBeLoginUser::class);
Route::get('/cart', [CartController::class, "index"])->middleware(MustBeLoginUser::class);
Route::put('/cart/checkout/{cart_item}/update', [CartController::class, "update"])->middleware(MustBeLoginUser::class);

Route::post('/cart/order', [OrderItemController::class, "store"])->middleware(MustBeLoginUser::class);
Route::post('/add-to-cart/{product}', [CartController::class, 'store'])->middleware(MustBeLoginUser::class);
Route::post("/cart_items/{cart_item}/delete", [CartController::class, 'destroy'])->middleware(MustBeLoginUser::class);
Route::post("/cart/{cart}/delete/all", [CartController::class, 'destroy_all'])->middleware(MustBeLoginUser::class);

Route::get('/wishlist', [WishListController::class, "index"])->middleware(MustBeLoginUser::class);
Route::Post('/add-to-wishlist/{product}', [WishListController::class, "store"])->middleware(MustBeLoginUser::class);
Route::Post('/wish_list_item/{wish_list_item}/delete', [WishListController::class, "destroy"])->middleware(MustBeLoginUser::class);

Route::Post('/orders/store', [OrderController::class, "store"])->middleware(MustBeLoginUser::class);

Route::get('/locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return back();
});

Route::get('/user/address/create/', [UserAddressController::class, "create"])->middleware(MustBeLoginUser::class);
Route::get('/user/address/{user_address}/edit', [UserAddressController::class, "edit"])->middleware(MustBeLoginUser::class);
Route::put('/user/address/{user_address}/update', [UserAddressController::class, "update"])->middleware(MustBeLoginUser::class);
Route::post('/user/address/store', [UserAddressController::class, "store"])->middleware(MustBeLoginUser::class);
Route::get('/user/address/store/{user_addresses}/address_name', [UserAddressController::class, "getAddressName"])->middleware(MustBeLoginUser::class);
Route::get('/user/address/store/{state_or_region}/townships', [UserAddressController::class, "getTownships"])->middleware(MustBeLoginUser::class);
Route::get('/user/address/store/{township}/zipcode', [UserAddressController::class, "gtZipCode"])->middleware(MustBeLoginUser::class);


// Email ......
Route::get('/sent-email/order/confirm', [EmailConrtoller::class, 'orderConfirm']);
Route::post('/sent-email/contact', [EmailConrtoller::class, 'contact']);
Route::get('/contact-us', [EmailConrtoller::class, 'contact_us'])->name('contact-us');
Route::get('/about-us', [EmailConrtoller::class, 'about_us'])->name('about-us');
Route::get('/privacy-and-policy', [EmailConrtoller::class, 'privacy_and_policy']);
Route::get('/terms-and-conditions', [EmailConrtoller::class, 'terms_and_conditions']);
Route::get('/orders-and-return', [EmailConrtoller::class, 'order_and_return']);

// verifine email
Route::get('/sent-email/otp', [OtpController::class, 'sendOtp'])->middleware('auth');
Route::get('/sent-email/otp/view', [OtpController::class, 'viewOtp'])->middleware('auth');
Route::post('/sent-email/verify', [OtpController::class, 'verifyOtp'])->middleware('auth');
Route::get('/sent-email/otp/confirm', [OtpController::class, 'confirmOtp'])->middleware('auth');
