<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
require __DIR__.'/auth.php';
use App\Http\Middleware\IsAdminMiddleware;

/* Rutas que solo renderizan vistas */
Route::get('/', [HomeController::class, 'index']);
Route::get('/contactanos', function () { return view('contactanos');});
Route::get('/quienes-somos', function () { return view('quienes-somos'); });
Route::get('/comercio', function () { return view('comercio'); });
Route::get('/terms', function () { return view('terminos'); });

/* Ruta para procesar formulario de contacto */
Route::post('/contactanos', [ContactoController::class, 'procesar']);

/* Rutas para mostrar catalogo y detalles */
Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
Route::get('/catalogo', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/productos', [CatalogController::class, 'index']);
Route::get('/catalogo/producto/{id}', [CatalogController::class, 'show'])->name('detalle');        

/* Rutas para usuarios autenticados */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/detalle', [CarritoController::class, 'agregarProducto'])->name('detalle.agregarProducto');
    Route::get('/carrito/eliminar/{detalleId}', [CarritoController::class, 'eliminarProducto'])->name('carrito.eliminar');

    Route::post('/compra/confirmar', [App\Http\Controllers\CompraController::class, 'confirmar'])->name('compra.confirmar');
    Route::get('/mis-compras', [CompraController::class, 'historial'])->name('compras.historial');
});

/* Rutas para administradores */
Route::middleware(['auth', IsAdminMiddleware::class])->group(function () {
    Route::get('/panel-control', function () { return view('panel-control');});
    
    Route::get('/consultas', [ContactoController::class, 'consultas']);
    
    Route::get('/usuarios', [AdminController::class, 'panel'])->name('login');
    Route::put('/usuarios/{id}', [AdminController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [AdminController::class, 'destroy'])->name('usuarios.destroy');
    //Rutas para crear categorias, productos y variantes
    Route::get('/crear-categoria', [CategoryController::class, 'create'])->name('categorias.create');
    Route::post('/crear-categoria', [CategoryController::class, 'store'])->name('categorias.store');
    Route::put('/categorias/{id}', [CategoryController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{id}', [CategoryController::class, 'destroy'])->name('categorias.destroy');
    Route::patch('/categorias/{id}/restore', [CategoryController::class, 'restore'])->name('categorias.restore');

    Route::get('/crear-producto', [ProductController::class, 'create'])->name('productos.create');
    Route::post('/crear-producto', [ProductController::class, 'store'])->name('productos.store');
    
    Route::get('/crear-variante', [VariantController::class, 'create'])->name('variantes.create');
    Route::post('/crear-variante', [VariantController::class, 'store'])->name('variantes.store');
    Route::delete('/crear-variante/{id}', [VariantController::class, 'destroy'])->name('variantes.destroy');


    Route::get('/editar-variante/{id}', [VariantController::class, 'editar'])->name('variantes.editar');
    Route::put('/editar-variante/{id}', [VariantController::class, 'update'])->name('variantes.update');
    Route::patch('/variantes/{id}/restore', [VariantController::class, 'restore'])->name('variantes.restore');

    Route::get('/ventas', [AdminController::class, 'ventas'])->name('ventas');
    Route::put('/ventas/{id}', [AdminController::class, 'updateVenta'])->name('ventas.update');
});

Route::fallback(function () {
    return response()->view('error-de-ruta', [], 404);
});