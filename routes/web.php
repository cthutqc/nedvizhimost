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

Route::get('categories/{category:slug}', \App\Http\Controllers\CategoryController::class)
    ->name('categories.show');

Route::get('object/{item:slug}', \App\Http\Controllers\ItemController::class)
    ->name('items.show');

Route::get('vacancies', \App\Http\Controllers\VacancyController::class)
    ->name('vacancies.index');

Route::get('employees', [\App\Http\Controllers\EmployeesController::class, 'index'])
    ->name('employees.index');

Route::get('employees/{user}', [\App\Http\Controllers\EmployeesController::class, 'show'])
    ->name('employees.show');

Route::get('services', [\App\Http\Controllers\ServiceController::class, 'index'])
    ->name('services.index');

Route::get('services/{service:slug}', [\App\Http\Controllers\ServiceController::class, 'show'])
    ->name('services.show');

Route::get('map/{category:slug}', \App\Http\Controllers\MapController::class)
    ->name('map.index');

Route::get('{page:slug}', \App\Http\Controllers\PageController::class)
    ->name('pages.show');
