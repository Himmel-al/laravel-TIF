<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;


// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::get('/go/{tujuan}', [HomeController::class, 'redirectTo'])->name('go');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/home/signup', [HomeController::class, 'signup'])->name('home.signup');

Route::get('/signin', [AuthController::class, 'showLogin'])->name('signin');
Route::post('/process', [AuthController::class, 'process'])->name('login.process');

Route::resource('dashboard', DashboardController::class);

// Pelaggan
Route::resource('pelanggan', PelangganController::class);
// Route::get('pelanggan',[PelangganController::class, 'index'])->name('pelanggan.list');
// Route::get('pelanggan/create',[PelangganController::class, 'create'])->name('pelanggan.create');
// Route::post('pelanggan/store',[PelangganController::class, 'store'])->name('pelanggan.store');
// Route::get('pelanggan/edit/{param1}',[PelangganController::class, 'edit'])->name('pelanggan.edit');
// Route::post('pelanggan/update',[PelangganController::class, 'update'])->name('pelanggan.update');
// Route::get('pelanggan/delete/{param1}',[PelangganController::class, 'destroy'])->name('pelanggan.destroy');

// Customer
Route::resource('customer', CustomerController::class);
// Route::get('customer',[CustomerController::class, 'index'])->name('customer.list');
// Route::get('customer/create',[CustomerController::class, 'create'])->name('customer.create');
// Route::post('customer/store',[CustomerController::class, 'store'])->name('customer.store');
// Route::get('customer/edit/{param1}',[CustomerController::class, 'edit'])->name('customer.edit');
// Route::post('customer/update',[CustomerController::class, 'update'])->name('customer.update');
// Route::get('customer/delete/{param1}',[CustomerController::class, 'destroy'])->name('customer.destroy');

// User
Route::resource('users', UserController::class);
