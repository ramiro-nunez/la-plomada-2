<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/* Rutas que solo renderizan vistas */
Route::get('/', function () {
    return view('welcome');
});
Route::get('/contactanos', function () {
    return view('contactanos');
});
Route::get('/quienes-somos', function () {
    return view('quienes-somos');});
Route::get('/comercio', function () {
    return view('comercio');
});
Route::get('/terms', function () {
    return view('terminos');
});
Route::get('/productos', function () {
    return view('productos');
});

/* Rutas que utilizan controlador */
Route::post('/contactanos', [ContactoController::class, 'procesar']);

Route::middleware('guest')->group(function () {
    Route::get('/registrarse', [RegisterController::class, 'create'])->name('registrarse.index');
    Route::post('/registrarse', [RegisterController::class, 'store'])->name('registrarse.store');
});

// Rutas para usuarios anónimos
Route::middleware('guest')->group(function () {
    Route::get('/iniciar-sesion', [LoginController::class, 'create'])->name('iniciar-sesion');
    Route::post('/iniciar-sesion', [LoginController::class, 'store'])->name('iniciar-sesion.store');
});

// Rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    // El logout SIEMPRE debe ser por POST para evitar ataques maliciosos (XSS/CSRF) mediante links simples
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});