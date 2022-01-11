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
Route::get('/nyheter/{newsId}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
