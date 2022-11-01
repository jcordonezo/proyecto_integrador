<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasHabitacionesUsuariosController;


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
    return view('main');
})->name('main');

Route::resource('habitaciones', 'App\http\Controllers\habitacionController');
Route::resource('usuarios', 'App\http\Controllers\UserController');
Route::resource('roles', 'App\http\Controllers\RolController');
Route::get('roles-pdf', 'App\http\Controllers\RolController@pdf')->name('roles.pdf');
Route::get('usuarios-pdf', 'App\http\Controllers\UserController@pdf')->name('usuarios.pdf');
Route::get('habitaciones-pdf', 'App\http\Controllers\habitacionController@pdf')->name('habitaciones.pdf');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


