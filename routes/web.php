<?php

use App\Http\Controllers\Users\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\AboutContentController;
use App\Http\Controllers\Admin\ServicesContentController;
use App\Http\Controllers\Admin\TeamContentController;
use App\Http\Controllers\Admin\CareersContentController;
use App\Http\Controllers\Admin\ContactContentController;

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
Route::view('/team', 'pages.team')->name('pages.team');
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

Route::group(['middleware' => 'auth'], function () {
    // Home content routes...
    Route::get('/admin/home', [HomeContentController::class, 'index'])->name('admin.home.index');
    Route::get('/admin/home/edit', [HomeContentController::class, 'edit'])->name('admin.home.edit');
    Route::post('/admin/home/update', [HomeContentController::class, 'update'])->name('admin.home.update');
    Route::get('/admin/home/preview', [HomeContentController::class, 'preview'])->name('admin.home.preview');
    Route::delete('/admin/home/remove-image', [HomeContentController::class, 'removeImage'])->name('admin.home.remove-image');
    // About content management routes
    Route::get('/admin/about', [AboutContentController::class, 'index'])->name('admin.about.index');
    Route::get('/admin/about/edit', [AboutContentController::class, 'edit'])->name('admin.about.edit');
    Route::post('/admin/about/update', [AboutContentController::class, 'update'])->name('admin.about.update');
    Route::get('/admin/about/preview', [AboutContentController::class, 'preview'])->name('admin.about.preview');
    // Services content management routes
    Route::get('/admin/services', [ServicesContentController::class, 'index'])->name('admin.services.index');
    Route::get('/admin/services/edit', [ServicesContentController::class, 'edit'])->name('admin.services.edit');
    Route::post('/admin/services/update', [ServicesContentController::class, 'update'])->name('admin.services.update');
    Route::get('/admin/services/preview', [ServicesContentController::class, 'preview'])->name('admin.services.preview');
    // Team content management routes
    Route::get('/admin/team', [TeamContentController::class, 'index'])->name('admin.team.index');
    Route::get('/admin/team/edit', [TeamContentController::class, 'edit'])->name('admin.team.edit');
    Route::post('/admin/team/update', [TeamContentController::class, 'update'])->name('admin.team.update');
    Route::get('/admin/team/preview', [TeamContentController::class, 'preview'])->name('admin.team.preview');
    // Careers content management routes
    Route::get('/admin/careers', [CareersContentController::class, 'index'])->name('admin.careers.index');
    Route::get('/admin/careers/edit', [CareersContentController::class, 'edit'])->name('admin.careers.edit');
    Route::post('/admin/careers/update', [CareersContentController::class, 'update'])->name('admin.careers.update');
    Route::get('/admin/careers/preview', [CareersContentController::class, 'preview'])->name('admin.careers.preview');
      // Contact content management routes
    Route::get('/admin/contact', [ContactContentController::class, 'index'])->name('admin.contact.index');
    Route::get('/admin/contact/edit', [ContactContentController::class, 'edit'])->name('admin.contact.edit');
    Route::post('/admin/contact/update', [ContactContentController::class, 'update'])->name('admin.contact.update');
    Route::get('/admin/contact/preview', [ContactContentController::class, 'preview'])->name('admin.contact.preview');
});

