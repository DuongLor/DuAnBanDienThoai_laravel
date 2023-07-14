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
