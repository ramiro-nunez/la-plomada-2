<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $categoriaId = $request->input('categoria');
        $orden = $request->input('orden');

        // Iniciamos consulta mapeando tus relaciones en español
        $query = Producto::with('categoria', 'var_productos')
            ->withMin('var_productos', 'precio'); // Genera la columna 'var_productos_min_precio'

        // Filtro por categoría
        if ($categoriaId) {
            $query->where('id_categoria', $categoriaId);
        }

        // Ordenamiento por el alias que genera withMin
        switch ($orden) {
            case 'precio_asc':
                $query->orderBy('var_productos_min_precio', 'asc');
                break;
            case 'precio_desc':
                $query->orderBy('var_productos_min_precio', 'desc');
                break;
            case 'alfabetico_asc':
                $query->orderBy('nombre', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $productos = $query->get();
        $categorias = Categoria::all();

        return view('productos', compact('productos', 'categorias'));
    }
    /**
     * Muestra el detalle de un producto específico con sus variantes.
     */
    public function show($id)
    {
        // Buscamos el producto con sus relaciones o tira error 404 si no existe
        $producto = Producto::with(['categoria', 'var_productos'])->findOrFail($id);

        return view('detalle', compact('producto'));
    }
}