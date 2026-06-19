<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Soft UI demo pages that are still useful for portfolio navigation.
    Route::view('/billing', 'billing')->name('billing');
    Route::view('/profile', 'profile')->name('profile');
    Route::view('/rtl', 'rtl')->name('rtl');
    Route::view('/tables', 'tables')->name('tables');
    Route::view('/virtual-reality', 'virtual-reality')->name('virtual-reality');
    Route::view('/user-management', 'laravel-examples/user-management')->name('user-management');

    Route::get('/user-profile', [InfoUserController::class, 'create'])->name('user-profile');
    Route::post('/user-profile', [InfoUserController::class, 'store'])->name('user-profile.store');

    Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/session', [SessionsController::class, 'store'])->name('session.store');

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login/forgot-password', [ResetController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ResetController::class, 'sendEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});
