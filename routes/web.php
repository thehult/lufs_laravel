<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\FrontpageController::class, 'index'])->name('frontpage');


Route::get('/nyheter', [App\Http\Controllers\NewsController::class, 'list'])->name('news.list');
Route::get('/nyheter/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth routes
Route::get('logga-in', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('postlogin'); 
Route::get('bli-medlem', [App\Http\Controllers\AuthController::class, 'registration'])->name('registration');
Route::post('register', [App\Http\Controllers\AuthController::class, 'register'])->name('postregistration'); 
Route::get('logga-ut', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


Route::get('/{slug}', [\App\Http\Controllers\PageController::class, 'find'])->where('slug', '.*')->name('page');