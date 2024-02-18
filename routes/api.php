<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/enviarcorreo', App\Http\Controllers\CorreoController::class)
->only(['index','store','update','show','edit','destroy']);

Route::post('/enviarcorreocita', [App\Http\Controllers\CorreoController::class, 'correocita' ]);

Route::resource('/clientes', App\Http\Controllers\ClienteController::class)
->only(['index','store','update','show','edit','destroy','buscar']);

Route::get('/sclientes/{priapellido}', [App\Http\Controllers\ClienteController::class, 'search' ]);

Route::resource('/visita', App\Http\Controllers\VisitaController::class)
->only(['index','store','update','show','edit','destroy']);

Route::resource('/membresias', App\Http\Controllers\MembresiaController::class)
->only(['index','store','update','show','edit','destroy']);

Route::resource('/fisioterapia', App\Http\Controllers\FisioterapiaController::class)
->only(['index','store','update','show','edit','destroy','fetch']);

Route::get('/fisioregistro/{id}', [App\Http\Controllers\FisioterapiaController::class, 'fetch' ]);

Route::resource('/anexos', App\Http\Controllers\AnexoController::class)
->only(['index','store','update','show','edit','destroy']);

Route::get('/anexos/{id}', [App\Http\Controllers\AnexoController::class, 'fetch' ]);

Route::resource('/otroregistro', App\Http\Controllers\RegistroController::class)
->only(['index','store','update','show','edit','destroy']);

Route::get('/otroregistro/{id}', [App\Http\Controllers\RegistroController::class, 'fetch' ]);

Route::resource('/ventas', App\Http\Controllers\VentaController::class)
->only(['index','store','update','show','edit','destroy']);

Route::post('/fechaventas', [App\Http\Controllers\VentaController::class, 'fechventas' ]);

Route::resource('/ventasfisio', App\Http\Controllers\VentafisioController::class)
->only(['index','store','update','show','edit','destroy']);

Route::post('/fechaventasfisio', [App\Http\Controllers\VentafisioController::class, 'fechventasfisio' ]);

Route::resource('/citas', App\Http\Controllers\CitaController::class)
->only(['index','store','update','show','edit','destroy']);




