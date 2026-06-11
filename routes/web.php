<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\CarritoController;

Route::get('/', function () {
    return view('welcome');
});

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


Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');


Route::get('/productos', [CatalogController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/catalogo', [CatalogController::class, 'index'])->name('catalog.index');
require __DIR__.'/auth.php';

// Ruta para ver el detalle de un producto específico
Route::get('/catalogo/producto/{id}', [CatalogController::class, 'show'])->name('detalle');


// FALTA AGREGAR ESTA LÍNEA para PROCESAR el formulario (POST)
Route::post('/contactanos', [ContactoController::class, 'procesar'])->name('contacto.procesar');

Route::middleware(['auth', IsAdminMiddleware::class])->group(function () {
    Route::get('/panel-control', [AdminController::class, 'panel'])->name('usuarios.index');
    Route::put('/panel-control/{id}', [AdminController::class, 'update'])->name('usuarios.update');
    Route::delete('/panel-control/{id}', [AdminController::class, 'destroy'])->name('usuarios.destroy');
    //Rutas para crear categorias, productos y variantes
    Route::get('/crear-categoria', [CategoryController::class, 'create'])->name('categorias.create');
    Route::post('/crear-categoria', [CategoryController::class, 'store'])->name('categorias.store');
    
    Route::get('/crear-producto', [ProductController::class, 'create'])->name('productos.create');
    Route::post('/crear-producto', [ProductController::class, 'store'])->name('productos.store');
    
    Route::get('/crear-variante', [VariantController::class, 'create'])->name('variantes.create');
    Route::post('/crear-variante', [VariantController::class, 'store'])->name('variantes.store');
    Route::delete('/crear-variante/{id}', [VariantController::class, 'destroy'])->name('variantes.destroy');

// FALTA AGREGAR ESTA LÍNEA para PROCESAR el formulario (POST)
Route::post('/contactanos', [ContactoController::class, 'procesar'])->name('contacto.procesar');

    Route::get('/editar-variante/{id}', [VariantController::class, 'editar'])->name('variantes.editar');
    Route::put('/editar-variante/{id}', [VariantController::class, 'update'])->name('variantes.update');
});

Route::post('/detalle', [CarritoController::class, 'agregarProducto'])->name('detalle.agregarProducto');
