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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/add', [App\Http\Controllers\RequerimentoController::class, 'index'])->name('requerimento')->middleware('auth');
Route::get('/despacho', [App\Http\Controllers\RequerimentoController::class, 'despacho'])->middleware('auth');
Route::any('/requerimento/search', [App\Http\Controllers\RequerimentoController::class, 'search'])->name('requerimeto.search');
Route::post('/store', [App\Http\Controllers\RequerimentoController::class, 'store'])->middleware('auth');
Route::get('/edit/{id}', [App\Http\Controllers\RequerimentoController::class, 'edit'])->middleware('auth');
Route::put('/update/{id}', [App\Http\Controllers\RequerimentoController::class, 'update'])->middleware('auth');
Route::delete('/destroy/{id}', [App\Http\Controllers\RequerimentoController::class, 'destroy'])->middleware('auth');

Route::get('/audiencia', [App\Http\Controllers\AudienciaController::class, 'index'])->name('audiencia')->middleware('auth');
Route::any('/audiencia/search', [App\Http\Controllers\AudienciaController::class, 'search'])->name('audiencias.search');
Route::post('/audiencia/store', [App\Http\Controllers\AudienciaController::class, 'store'])->middleware('auth');
Route::delete('/audiencia/destroy/{id}', [App\Http\Controllers\AudienciaController::class, 'destroy'])->middleware('auth');
Route::get('/audiencia/edit/{id}', [App\Http\Controllers\AudienciaController::class, 'edit'])->middleware('auth');
Route::put('/audiencia/update/{id}', [App\Http\Controllers\AudienciaController::class, 'update'])->middleware('auth');
Route::get('/audiencia/resumo', [App\Http\Controllers\AudienciaController::class, 'resumo'])->name('audiencias.resumo')->middleware('auth');

Route::get('/nota', [App\Http\Controllers\NotaController::class, 'index'])->name('notas.nota')->middleware('auth');
Route::any('/nota/search', [App\Http\Controllers\NotaController::class, 'search'])->name('notas.search')->middleware('auth');
Route::post('/nota/store', [App\Http\Controllers\NotaController::class, 'store'])->middleware('auth');
Route::delete('/nota/destroy/{id}', [App\Http\Controllers\NotaController::class, 'destroy'])->middleware('auth');
Route::get('/nota/edit/{id}', [App\Http\Controllers\NotaController::class, 'edit'])->middleware('auth');
Route::put('/nota/update/{id}', [App\Http\Controllers\NotaController::class, 'update'])->middleware('auth');


Route::get('/send-email', [App\Http\Controllers\MailController::class, 'sendEmail'])->name('send.email');
