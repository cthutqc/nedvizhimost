<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Http\Controllers\HomeController::class)
    ->name('home');

Route::get('/categories/{category:slug}', \App\Http\Controllers\CategoryController::class)
    ->name('categories.show');

Route::get('/object/{item:slug}', \App\Http\Controllers\ItemController::class)
    ->name('items.show');

Route::get('/{page:slug}', \App\Http\Controllers\PageController::class)
    ->name('pages.show');
