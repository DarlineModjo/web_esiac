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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/activite', [App\Http\Controllers\HomeController::class, 'activite'])->name('activite');

Route::post('/activite', [App\Http\Controllers\HomeController::class, 'store'])->name('activite');

//Route::get('/activite/{id}', [App\Http\Controllers\HomeController::class, 'store'])->name('activite.delete');


Route::get('/delete', [App\Http\Controllers\HomeController::class, 'destroy'])->name('delete');


