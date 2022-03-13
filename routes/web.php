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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add', [App\Http\Controllers\RequerimentoController::class, 'index'])->name('requerimento');
Route::get('/despacho', [App\Http\Controllers\RequerimentoController::class, 'despacho']);
Route::any('/requerimento/search', [App\Http\Controllers\RequerimentoController::class, 'search'])->name('requerimeto.search');
Route::post('/store', [App\Http\Controllers\RequerimentoController::class, 'store']);
Route::get('/edit/{id}', [App\Http\Controllers\RequerimentoController::class, 'edit']);
Route::put('/update/{id}', [App\Http\Controllers\RequerimentoController::class, 'update']);
Route::delete('/destroy/{id}', [App\Http\Controllers\RequerimentoController::class, 'destroy']);
