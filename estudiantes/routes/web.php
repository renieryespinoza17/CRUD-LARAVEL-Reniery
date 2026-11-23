<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EstudianteController;
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'create'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:6,1')->name('login.store');

Route::middleware('auth')->group(function () {
    Route::view('/inicio', 'inicio')->name('inicio');

    Route::get('/estudiantes', [EstudianteController::class, 'index'])
        ->name('estudiantes.index');

    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');
});