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

/*
|--------------------------------------------------------------------------
| Web Routes Login
|--------------------------------------------------------------------------
*/
//Route::post('login', [App\Http\Controllers\UserController::class, 'doLogin']);
// Route::get('admin', [App\Http\Controllers\UserController::class, 'gotoAdmin']);
// Route::get('supervisor', [App\Http\Controllers\UserController::class, 'gotoSupervisor']);
// Route::get('registerForm', [App\Http\Controllers\UserController::class, 'gotoRegister']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Web Routes beneficiario
|--------------------------------------------------------------------------
*/
Route::get('/register_beneficiario', [App\Http\Controllers\BeneficiarioController::class, 'index'])->name('beneficiario')->middleware('auth');
Route::any('/beneficiario/search', [App\Http\Controllers\BeneficiarioController::class, 'search'])->name('beneficiarios.search');
Route::post('/beneficiario/store', [App\Http\Controllers\BeneficiarioController::class, 'store'])->middleware('auth');
Route::delete('/beneficiario/destroy/{id}', [App\Http\Controllers\BeneficiarioController::class, 'destroy'])->middleware('auth');
Route::get('/beneficiario/edit/{id}', [App\Http\Controllers\BeneficiarioController::class, 'edit'])->middleware('auth');
Route::put('/beneficiario/update/{id}', [App\Http\Controllers\BeneficiarioController::class, 'update'])->middleware('auth');
Route::get('/getRegistos', [App\Http\Controllers\BeneficiarioController::class, 'getRegistos'])->name('dados')->middleware('auth');


//Rotas Dashboard Administrador
Route::get('/admin/admininistrador', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');
Route::get('/user/list', [App\Http\Controllers\Controller::class, 'usersList'])->middleware('auth');
Route::any('/user/search', [App\Http\Controllers\Controller::class, 'search'])->name('users.search')->middleware('auth');
Route::delete('/user/destroy/{id}', [App\Http\Controllers\Controller::class, 'destroy'])->middleware('auth');
Route::get('/user/edit/{id}', [App\Http\Controllers\Controller::class, 'edit'])->middleware('auth');
Route::put('/user/update/{id}', [App\Http\Controllers\Controller::class, 'update'])->middleware('auth');




Route::get('/add', [App\Http\Controllers\RequerimentoController::class, 'index'])->name('requerimento')->middleware('auth');
Route::get('/despacho', [App\Http\Controllers\RequerimentoController::class, 'despacho'])->middleware('auth');
Route::any('/requerimento/search', [App\Http\Controllers\RequerimentoController::class, 'search'])->name('requerimeto.search');
Route::post('/store', [App\Http\Controllers\RequerimentoController::class, 'store'])->middleware('auth');
Route::get('/edit/{id}', [App\Http\Controllers\RequerimentoController::class, 'edit'])->middleware('auth');
Route::put('/update/{id}', [App\Http\Controllers\RequerimentoController::class, 'update'])->middleware('auth');
Route::delete('/destroy/{id}', [App\Http\Controllers\RequerimentoController::class, 'destroy'])->middleware('auth');





Route::get('/nota', [App\Http\Controllers\NotaController::class, 'index'])->name('notas.nota')->middleware('auth');
Route::any('/nota/search', [App\Http\Controllers\NotaController::class, 'search'])->name('notas.search')->middleware('auth');
Route::post('/nota/store', [App\Http\Controllers\NotaController::class, 'store'])->middleware('auth');
Route::delete('/nota/destroy/{id}', [App\Http\Controllers\NotaController::class, 'destroy'])->middleware('auth');
Route::get('/nota/edit/{id}', [App\Http\Controllers\NotaController::class, 'edit'])->middleware('auth');
Route::put('/nota/update/{id}', [App\Http\Controllers\NotaController::class, 'update'])->middleware('auth');


Route::get('/send-email', [App\Http\Controllers\MailController::class, 'sendEmail'])->name('send.email');
