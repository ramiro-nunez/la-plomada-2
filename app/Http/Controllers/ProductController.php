<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Traemos los productos de la DB, paginados de a 12 por página.
        // Opcional: puedes agregar un where() si solo quieres mostrar productos con stock.
        $productos = Producto::paginate(12);

        // Retornamos la vista y le pasamos la variable $productos
        // usando compact() para que Blade pueda leerla.
        return view('panel-control', compact('productos'));
    }
}
