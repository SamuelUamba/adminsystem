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
Route::get('register', [App\Http\Controllers\HomeController::class, 'register']);
Route::post('doregister', [App\Http\Controllers\HomeController::class, 'create']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Web Routes beneficiario
|--------------------------------------------------------------------------
*/

Route::get('/register_beneficiario', [App\Http\Controllers\BeneficiarioController::class, 'index'])->name('beneficiario')->middleware('auth');;
Route::post('/beneficiario/store', [App\Http\Controllers\BeneficiarioController::class, 'store']); // devido ao auto registo
Route::any('/beneficiario/search', [App\Http\Controllers\BeneficiarioController::class, 'search'])->name('beneficiarios.search');
Route::delete('/beneficiario/destroy/{id}', [App\Http\Controllers\BeneficiarioController::class, 'destroy'])->name('beneficiario.destroy')->middleware('auth');
Route::get('/beneficiario/edit/{id}', [App\Http\Controllers\BeneficiarioController::class, 'edit'])->middleware('auth');
Route::put('/beneficiario/update/{id}', [App\Http\Controllers\BeneficiarioController::class, 'update'])->middleware('auth');
Route::get('/getRegistos', [App\Http\Controllers\BeneficiarioController::class, 'getRegistos'])->name('dados')->middleware('auth');

//Rotas de comprovativos
Route::get('/exportListaBeneficiarios', [App\Http\Controllers\PDFController::class, 'gerarPDF']);
Route::get('/pdf/{id}', [App\Http\Controllers\PDFController::class, 'gerarComprovativo']);



//Rotas de registo de Mercados
Route::get('/mercados', [App\Http\Controllers\MercadoController::class, 'index'])->name('mercado')->middleware('auth');
Route::post('/mercados/store', [App\Http\Controllers\MercadoController::class, 'store'])->middleware('auth');
Route::get('/mercados/list', [App\Http\Controllers\MercadoController::class, 'mercadosList'])->middleware('auth');
Route::any('/mercados/search', [App\Http\Controllers\MercadoController::class, 'search'])->name('mercados.search');
Route::delete('/mercados/destroy/{id}', [App\Http\Controllers\MercadoController::class, 'destroy'])->name('mercado.destroy')->middleware('auth');
Route::get('/mercados/edit/{id}', [App\Http\Controllers\MercadoController::class, 'edit'])->middleware('auth');
Route::put('/mercados/update/{id}', [App\Http\Controllers\MercadoController::class, 'update'])->middleware('auth');


//Rotas Dashboard Administrador
Route::get('/admin/admininistrador', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');
Route::get('/user/list', [App\Http\Controllers\Controller::class, 'usersList'])->middleware('auth');
Route::any('/user/search', [App\Http\Controllers\Controller::class, 'search'])->name('users.search')->middleware('auth');
Route::delete('/user/destroy/{id}', [App\Http\Controllers\Controller::class, 'destroy'])->name('users.destroy');
Route::get('/user/edit/{id}', [App\Http\Controllers\Controller::class, 'edit'])->middleware('auth');
Route::put('/user/update/{id}', [App\Http\Controllers\Controller::class, 'update'])->middleware('auth');

//Rota de Exportar PDF

Route::get('/send-email', [App\Http\Controllers\MailController::class, 'sendEmail'])->name('send.email');
