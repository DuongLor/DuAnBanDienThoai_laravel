<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\BrandAdminController;
use App\Http\Controllers\Admin\ColorAdminController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\ReviewAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\SlideController as SlideAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Trang home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
Route::get('/brand/{id}', [ProductController::class, 'brand'])->name('brand.show');
Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/verify/{token}', [RegisterController::class, 'verify'])->name('confirm_email');

Route::group(['middleware' => 'auth'], function () {
	// Profile
	Route::get('profile', [ProfileController::class, 'index'])->name('profile');
	Route::put('profile/{profileId}', [ProfileController::class, 'update'])->name('profile.update');
	// Addresses user
	Route::get('address', [AddressController::class, 'index'])->name('address');
	Route::get('addess/create', [AddressController::class, 'create'])->name('address.create');
	Route::post('address', [AddressController::class, 'store'])->name('address.store');
	Route::get('address/edit/{addressId}', [AddressController::class, 'edit'])->name('address.edit');
	Route::put('address/update/{addressId}', [AddressController::class, 'update'])->name('address.update');
	Route::match(['delete', 'get'], '/delete/{id}', [AddressController::class, 'destroy'])->name('address.destroy');
	// Cart
	Route::get('cart', [CartController::class, 'index'])->name('cart');
	Route::post('cart', [CartController::class, 'store'])->name('cart.store');
	Route::put('cart/{cartId}', [CartController::class, 'update'])->name('cart.update');
	Route::get('cart/delete/{cartId}', [CartController::class, 'destroy'])->name('cart.delete');
	// Oder
	Route::get('oder', [OderController::class, 'index'])->name('oder.index');
	Route::post('oder', [OderController::class, 'store'])->name('oder.store');
	// Bill
	Route::get('bill', [BillController::class, 'index'])->name('bill');
	Route::get('bill/list', [BillController::class, 'list'])->name('bill.list');
	Route::get('bill/show/{id}', [BillController::class, 'show'])->name('bill.show');
});

//admin
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function () {
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

	// admin brand
	Route::get('/brand', [BrandAdminController::class, 'index'])->name('adminBrand');
	Route::get('/brand/create', [BrandAdminController::class, 'create'])->name('adminBrand.create');
	Route::post('/brand', [BrandAdminController::class, 'store'])->name('adminBrand.store');
	Route::get('/brand/edit/{brandId}', [BrandAdminController::class, 'edit'])->name('adminBrand.edit');
	Route::put('/brand/update/{brandId}', [BrandAdminController::class, 'update'])->name('adminBrand.update');
	Route::match(['delete', 'get'], '/delete/{id}', [BrandAdminController::class, 'destroy'])->name('adminBrand.delete');

	// admin color
	Route::get('/color', [ColorAdminController::class, 'index'])->name('adminColor');
	Route::get('/color/create', [ColorAdminController::class, 'create'])->name('adminColor.create');
	Route::post('/color', [ColorAdminController::class, 'store'])->name('adminColor.store');
	Route::get('/color/edit/{colorId}', [ColorAdminController::class, 'edit'])->name('adminColor.edit');
	Route::put('/color/update/{colorId}', [ColorAdminController::class, 'update'])->name('adminColor.update');
	Route::get('/color/delete/{colorId}', [ColorAdminController::class, 'destroy'])->name('adminColor.delete');

	// admin product
	Route::get('/product', [ProductAdminController::class, 'index'])->name('adminProduct');
	Route::get('/product/create', [ProductAdminController::class, 'create'])->name('adminProduct.create');
	Route::post('/product', [ProductAdminController::class, 'store'])->name('adminProduct.store');
	Route::get('/product/edit/{productId}', [ProductAdminController::class, 'edit'])->name('adminProduct.edit');
	Route::put('/product/update/{productId}', [ProductAdminController::class, 'update'])->name('adminProduct.update');
	Route::get('/product/delete/{productId}', [ProductAdminController::class, 'destroy'])->name('adminProduct.delete');

	// admin Slide
	Route::get('/slide', [SlideAdminController::class, 'index'])->name('adminSlide');
	Route::get('/slide/create', [SlideAdminController::class, 'create'])->name('adminSlide.create');
	Route::post('/slide', [SlideAdminController::class, 'store'])->name('adminSlide.store');
	Route::get('/slide/edit/{slideId}', [SlideAdminController::class, 'edit'])->name('adminSlide.edit');
	Route::put('/slide/update/{slideId}', [SlideAdminController::class, 'update'])->name('adminSlide.update');
	Route::get('/slide/delete/{slideId}', [SlideAdminController::class, 'destroy'])->name('adminSlide.delete');

	//admin review
	Route::get('/review', [ReviewAdminController::class, 'index'])->name('adminReview');
	Route::get('/review/delete/{reviewId}', [ReviewAdminController::class, 'destroy'])->name('adminReview.delete');

	// admin oder
	Route::get('/order', [OrderAdminController::class, 'index'])->name('adminOrder');
	Route::get('/order/edit/{oderId}', [OrderAdminController::class, 'edit'])->name('adminOrder.edit');
	Route::put('/order/update/{oderId}', [OrderAdminController::class, 'update'])->name('adminOrder.update');

	// admin user
	Route::get('/user', [UserAdminController::class, 'index'])->name('adminUser');
	Route::get('/user/delete/{userId}', [HomeController::class, 'destroy'])->name('adminUser.delete');
});
