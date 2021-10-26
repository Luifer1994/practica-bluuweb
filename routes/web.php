<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PruebaController;
use App\Http\Controllers\EmpleadoController;

Route::get('/', [EmpleadoController::class,'index']);

Route::get('/hello',
[PruebaController::class, 'vistaPrueba']);

Route::resource('/empleado', EmpleadoController::class);
// Route::get('/empleado', [EmpleadoController::class, 'index']);




// Route::view('/empleado', 'empleado.index');
// Route::view('/empleado', 'empleado.index');

// Route::get('/hello', [App\Http\Controllers\PruebaController::class, 'vistaPrueba']);
