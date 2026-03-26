<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Guest routes
Route::get('/', [PageController::class, 'landing'])->name('landing');
Route::get('/signin', [PageController::class, 'signin'])->name('signin');
Route::get('/signup', [PageController::class, 'signup'])->name('signup');

// Auth actions
Route::post('/login', [PageController::class, 'doLogin'])->name('login');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');

// Authenticated routes
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/analisis', [PageController::class, 'analisis'])->name('analisis');
Route::get('/edukasi', [PageController::class, 'edukasi'])->name('edukasi');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/settings', [PageController::class, 'settings'])->name('settings');
