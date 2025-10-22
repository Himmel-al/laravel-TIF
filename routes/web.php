<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/go/{tujuan}', [HomeController::class, 'redirectTo'])->name('go');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/signup', [HomeController::class, 'signup'])->name('home.signup');

Route::get('/signin', [AuthController::class, 'showLogin'])->name('signin');
Route::post('/process', [AuthController::class, 'process'])->name('login.process');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('pelanggan',[PelangganController::class, 'index'])->name('pelanggan.list');

Route::get('pelanggan/create',[PelangganController::class, 'create'])->name('pelanggan.create');

Route::post('pelanggan/store',[PelangganController::class, 'store'])->name('pelanggan.store');
