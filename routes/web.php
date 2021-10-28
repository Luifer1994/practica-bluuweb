<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Auth;


Auth::routes();
Route::middleware(['auth:sanctum', 'verified'])->get('/', [EmpleadoController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->resource('/empleado', EmpleadoController::class);

