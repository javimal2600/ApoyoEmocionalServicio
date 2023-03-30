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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\PsicologoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RefugioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\EncuestaController;


Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	//Psicologos
	Route::get('/psicologos', [PsicologoController::class, 'index'])->name('psicologos');
	Route::post('/guardar_psicologo', [PsicologoController::class, 'store'])->name('guardar_psicologo');
	Route::post('/update_psicologo{id}', [PsicologoController::class, 'update'])->name('update_psicologo');
	Route::get('/delete_psicologo{id}', [PsicologoController::class, 'destroy'])->name('delete_psicologo');
	//Clientes
	Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
	Route::post('/guardar_cliente', [ClienteController::class, 'store'])->name('guardar_cliente');
	Route::post('/update_cliente{id}', [ClienteController::class, 'update'])->name('update_cliente');
	Route::get('/delete_cliente{id}', [ClienteController::class, 'destroy'])->name('delete_cliente');
	//Refugios
	Route::get('/refugios', [RefugioController::class, 'index'])->name('refugios');
	Route::post('/guardar_refugio', [RefugioController::class, 'store'])->name('guardar_refugio');
	Route::post('/update_refugio{id}', [RefugioController::class, 'update'])->name('update_refugio');
	Route::get('/delete_refugio{id}', [RefugioController::class, 'destroy'])->name('delete_refugio');
	//Mascotas
	Route::get('/mascotas', [MascotaController::class, 'index'])->name('mascotas');
	Route::post('/guardar_mascota', [MascotaController::class, 'store'])->name('guardar_mascota');
	Route::post('/update_mascota{id}', [MascotaController::class, 'update'])->name('update_mascota');
	Route::get('/delete_mascota{id}', [MascotaController::class, 'destroy'])->name('delete_mascota');
	//Encuesta
    Route::get('/encuesta', [EncuestaController::class, 'index'])->name('encuesta');
	Route::post('/guardar_encuesta', [EncuestaController::class, 'store'])->name('guardar_encuesta');
    //
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::resource('encuesta','App\Http\Controllers\EncuestaController');
Route::resource('solicituds','App\Http\Controllers\SolicitudController');
Route::resource('adopcions','App\Http\Controllers\AdopcionController');
