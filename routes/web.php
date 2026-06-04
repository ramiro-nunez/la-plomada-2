<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Controllers\ProductController;

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
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    // El logout SIEMPRE debe ser por POST para evitar ataques maliciosos (XSS/CSRF) mediante links simples
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});

Route::middleware(['auth', IsAdminMiddleware::class])->group(function () {
    Route::get('/panel-control', [VariantController::class, 'index'])->name('variantes.index');
    Route::put('/panel-control/{id}', [VariantController::class, 'update'])->name('variantes.update');
    Route::delete('/panel-control/{id}', [VariantController::class, 'destroy'])->name('variantes.destroy');
    //Rutas para crear categorias, productos y variantes
    Route::get('/crear-categoria', [CategoryController::class, 'create'])->name('categorias.create');
    Route::get('/crear-producto', [ProductController::class, 'create'])->name('productos.create');
    Route::get('/crear-variante', [VariantController::class, 'create'])->name('variantes.create');
});