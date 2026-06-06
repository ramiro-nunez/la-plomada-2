<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request) { 
        $categorias = Categoria::paginate(12);
        $productos = Producto::paginate(12);

        // Retornamos la vista y le pasamos la variable $var_productos
        // usando compact() para que Blade pueda leerla.

        return view('crear-producto', compact('categorias', 'productos'));
    }
    
    public function store(Request $request) { 
        
        $producto = Producto::create([
            'name' => $request->name,
            'id_categoria' => $request->id_categoria,
        ]);
        return redirect('/panel-control')->with('success', 'Producto creado exitosamente!');
    }
}
