<?php

namespace App\Http\Controllers;
use App\Models\Producto;


class HomeController extends Controller
{
    public function index()
    {
        // Traemos los últimos 6 productos agregados con sus relaciones
        $productosNuevos = Producto::with(['categoria', 'var_productos'])
            ->withMin('var_productos', 'precio') // Esto genera de forma automática la variable var_productos_min_precio
            ->orderBy('created_at', 'desc')
            ->take(6) // Tomamos 6 para armar 2 pantallas de 3 productos cada una
            ->get();

        return view('welcome', compact('productosNuevos')); // Cambiá 'welcome' por el nombre de tu vista de inicio
    }
}
