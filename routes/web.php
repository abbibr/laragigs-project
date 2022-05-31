<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;


// listings
Route::controller(ListingController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{listing}', 'show')->name('show');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{listing}', 'edit')->name('edit');
    Route::put('/edit/{listing}', 'update')->name('update');
    Route::delete('/delete/{listing}', 'destroy')->name('destroy');
    Route::get('/manage', 'manage')->name('manage');
});

// register (auth)
Route::controller(RegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register.store');
});

// login (auth)
Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'store')->name('login.store');
});

// logout (auth)
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// search
Route::get('/search', [SearchController::class, 'search'])->name('search');

// switch language
Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])
    ->name('lang.switch');

// admin 
Route::controller(AdminController::class)->group(function() {
    Route::get('/admin/posts', 'index')->name('admin.index');
    Route::get('/admin/edit/{listing}', 'edit')->name('admin.edit');
    Route::put('/admin/update/{listing}', 'update')->name('admin.update');
    Route::delete('/admin/delete/{listing}', 'destroy')->name('admin.destroy');
});
