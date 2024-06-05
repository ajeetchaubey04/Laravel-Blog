<?php

use App\Http\Controllers\Admin\AppController as AdminAppController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AppController::class, 'index'])->name("index");

Route::get('/about-us', [AppController::class, 'aboutUs'])->name("about-us");

Route::get('/contact-us', [AppController::class, 'contactUs'])->name("contact-us");

Route::get('/blogs', [AppController::class, 'blogs'])->name("blogs");

Route::get('/blog/{slug}', [AppController::class, 'blog'])->name("blog");

##admin routes

Route::group(['prefix' => 'admin'], function () {

    Route::get('dashboard', [AdminAppController::class, 'dashboard'])->name("dashboard");

    Route::get('categories', [AdminAppController::class, 'categories'])->name("categories");
    Route::get('add-categories', [AdminAppController::class, 'addCategory'])->name("categories.add");
    Route::get('edit-category/{id}', [AdminAppController::class, 'editCategory'])->name("categories.edit");
    Route::post('store-category', [AdminAppController::class, 'storeCategory'])->name('categories.store');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
