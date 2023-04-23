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
    return view('auth.login');
});




Route::get('/enviarwsp', [App\Http\Controllers\WaController::class, 'enviar']);

Route::post('/webhook', [App\Http\Controllers\WaController::class, 'recibe']);


Auth::routes(); {
   
 
    Route::get('/pdf/{id}', [App\Http\Controllers\HomeController::class, 'indexpdf'])->name('pdf');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/venta', [App\Http\Controllers\HomeController::class, 'index'])->name('venta');
    Route::get('/historiaclinica', [App\Http\Controllers\HomeController::class, 'index'])->name('historiaclinica');
    Route::get('/historiaclinica', [App\Http\Controllers\HomeController::class, 'index'])->name('historiaclinica');
    Route::get('/citas', [App\Http\Controllers\HomeController::class, 'index'])->name('citas');

   
}

