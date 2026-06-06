<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoryController extends Controller
{
    public function create(Request $request) { 
        // Traemos los productos de la DB, paginados de a 12 por página.
        // Opcional: puedes agregar un where() si solo quieres mostrar productos con stock.
        $categorias = Categoria::paginate(12);
        
        // Retornamos la vista y le pasamos la variable $var_productos
        // usando compact() para que Blade pueda leerla.
        return view('crear-categoria', compact('categorias'));
    }

    public function store(Request $request) { 
        
        $categoria = Categoria::create([
            'nombre' => $request->nombre,
        ]);
        return redirect('/panel-control')->with('success', 'Categoría creada exitosamente!');
    }

}
