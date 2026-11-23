<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'create'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:6,1')->name('login.store');

Route::middleware('auth')->group(function () {
    Route::get('/inicio', function () {
        return redirect()->route('productos.index');
    })->name('inicio');

    Route::get('/productos', [ProductoController::class, 'index'])
        ->name('productos.index');

    Route::get('/productos/crear', [ProductoController::class, 'create'])
        ->name('productos.create');

    Route::post('/productos', [ProductoController::class, 'store'])
        ->name('productos.store');

    Route::get('/productos/{id}/editar', [ProductoController::class, 'edit'])
        ->whereNumber('id')->name('productos.edit');

    Route::put('/productos/{id}', [ProductoController::class, 'update'])
        ->whereNumber('id')->name('productos.update');
        
    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');
});