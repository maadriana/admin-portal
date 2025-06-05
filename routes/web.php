<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('dashboard'));
Route::get('/login', fn() => view('auth.auth-login-basic'));



Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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
Route::view('/logout', 'auth.logout')->name('logout'); // or redirect if needed
