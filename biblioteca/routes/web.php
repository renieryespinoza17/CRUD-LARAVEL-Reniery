<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'create'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:6,1')->name('login.store');

Route::middleware('auth')->group(function () {
    Route::get('/inicio', function () {
        return redirect()->route('libros.index');
    })->name('inicio');

    Route::get('/libros', [LibroController::class, 'index'])
        ->name('libros.index');

    Route::get('/libros/crear', [LibroController::class, 'create'])
        ->name('libros.create');
    Route::post('/libros', [LibroController::class, 'store'])
        ->name('libros.store');

    Route::get('/libros/{id}/editar', [LibroController::class, 'edit'])
        ->whereNumber('id')->name('libros.edit');

    Route::put('/libros/{id}', [LibroController::class, 'update'])
        ->whereNumber('id')->name('libros.update');

    Route::delete('/libros/{id}', [LibroController::class, 'destroy'])
        ->whereNumber('id')->name('libros.destroy');

    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');

});
