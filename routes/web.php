<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Address;

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
	// Định nghĩa route xóa với phương thức DELETE và GET
	Route::match(['delete', 'get'], '/delete/{id}', [AddressController::class, 'destroy'])->name('address.destroy');
});
