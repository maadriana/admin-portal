<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;

Route::get('/login', [AuthController::class, 'view'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/', [Dashboard::class, 'view'])->middleware('auth')->name('dashboard');
Route::get('/dashboard', [Dashboard::class, 'view'])->middleware('auth')->name('dashboard');

// User
Route::view('/users', 'users.index')->name('users.index');

// Website Pages
Route::view('/home', 'pages.home')->name('pages.home');
Route::view('/about', 'pages.about')->name('pages.about');
Route::view('/services', 'pages.services')->name('pages.services');
Route::view('/people', 'pages.people')->name('pages.people');
Route::view('/careers', 'pages.careers')->name('pages.careers');
Route::view('/international', 'pages.international')->name('pages.international');
Route::view('/contact', 'pages.contact')->name('pages.contact');

// Navigation UI
Route::view('/nav/header', 'nav.header')->name('nav.header');
Route::view('/nav/footer', 'nav.footer')->name('nav.footer');

// User Account
Route::view('/profile', 'users.profile')->name('profile');
Route::view('/settings', 'users.settings')->name('settings');
Route::get('/', [AuthController::class, 'logout'])->name('logout');