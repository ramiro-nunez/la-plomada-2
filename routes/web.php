<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/quienes-somos', function () {
    return view('quienes-somos');});
Route::get('/comercio', function () {
    return view('comercio');
});
Route::get('/terms', function () {
    return view('terminos');
});
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
