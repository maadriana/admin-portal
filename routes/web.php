<?php

use App\Http\Controllers\Users\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Admin\HomeContentController;

Route::get('/login', [AuthController::class, 'view'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/', [Dashboard::class, 'view'])->middleware('auth')->name('dashboard');
Route::get('/dashboard', [Dashboard::class, 'view'])->middleware('auth')->name('dashboard');

// User list
Route::group(['middleware' => 'auth'], function () {
    Route::get('/users', [Users::class, 'index'])->name('users.index');
    Route::post('/users', [Users::class, 'create'])->name('users.store');
    Route::put('/users/{id}', [Users::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [Users::class, 'destroy'])->name('users.destroy');
});


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
Route::group(['middleware' => 'auth'], function () {
    Route::view('/profile', 'users.profile')->name('profile');
    Route::put('/profile/update/{id}', [Users::class, 'update'])->name('profile.update');
    Route::view('/settings', 'users.settings')->name('settings');
    Route::get('/', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/admin/home/preview', function () {
    return view('pages.home'); // Already uses getContent()
})->name('admin.home.preview');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/home/edit', [HomeContentController::class, 'edit'])->name('admin.home.edit');
    Route::post('/admin/home/update', [HomeContentController::class, 'update'])->name('admin.home.update');
});

// For deleting the image
Route::delete('/admin/home/image/remove', [HomeContentController::class, 'removeImage'])->name('admin.home.removeImage');