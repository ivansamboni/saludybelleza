<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});



Auth::routes(); {
   
 
    Route::get('/pdf/{id}', [App\Http\Controllers\HomeController::class, 'indexpdf'])->name('pdf');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/ventagimnasio', [App\Http\Controllers\HomeController::class, 'index'])->name('venta');
    Route::get('/ventafisioterapia', [App\Http\Controllers\HomeController::class, 'index'])->name('fisio');
    Route::get('/historiaclinica', [App\Http\Controllers\HomeController::class, 'index'])->name('historiaclinica');
    Route::get('/citas', [App\Http\Controllers\HomeController::class, 'index'])->name('citas');
    Route::get('/observaciones', [App\Http\Controllers\HomeController::class, 'index'])->name('observaciones');

   
}

