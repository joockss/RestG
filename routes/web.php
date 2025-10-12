<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\DetalleOrdenController;

// Página principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas CRUD
Route::resource('mesas', MesaController::class);
Route::resource('reservas', ReservaController::class);
Route::resource('ordenes', OrdenController::class);
Route::resource('detalles', DetalleOrdenController::class);