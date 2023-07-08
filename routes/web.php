<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;

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
Route::post('/review/store',[ReviewController::class, 'store'])->name('review.store');
// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/verify/{token}', [RegisterController::class, 'verify'])->name('confirm_email');

Route::group(['middleware' => 'auth'], function(){
	Route::get('profile', [ProfileController::class, 'index'])->name('profile');
});