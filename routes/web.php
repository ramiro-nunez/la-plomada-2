<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('/productos', function () {
    return view('productos');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
