<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;

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

Route::get('/', function () {
    return view('login');
});
Route::get('/home', function () {
    return view('dashboard');
});

Route::get('/users', [UserController::class, 'getUsers']);
Route::get('/search', [UserController::class, 'searchUsers']);
Route::get('/user/{id}', [UserController::class, 'getUser']);
Route::post('/add-coins', [UserController::class, 'addCoins']);

Route::get('/vendors', [VendorController::class, 'index'])->name('vendor.index');
Route::get('/vendor/create', [VendorController::class, 'create'])->name('vendor.create');
Route::post('/vendor/store', [VendorController::class, 'store'])->name('vendor.store');
Route::get('/vendor/edit/{id}', [VendorController::class, 'edit'])->name('vendor.edit');
Route::post('/vendor/update/{id}', [VendorController::class, 'update'])->name('vendor.update');
Route::delete('/vendor/delete/{id}', [VendorController::class, 'destroy'])->name('vendor.destroy');

// Route::get('/users', [UserController::class, 'index'])->name('user.index');
// Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
// Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
// Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
// Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
// Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
