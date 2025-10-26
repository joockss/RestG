<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\MesaController;

// Página de inicio (pública)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas para clientes (requieren login y email verificado)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
});

// Rutas solo para ADMIN
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::resource('mesas', MesaController::class);
    
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::get('/reservas/{id}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
    Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update');
    Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
});

// Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('reservas.index');
        }
        return redirect()->route('reservas.create');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
/*
require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
*/