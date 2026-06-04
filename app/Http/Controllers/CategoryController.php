<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoryController extends Controller
{
    public function create(Request $request) { 
        
        return view('crear-categoria');
    }

    public function store(Request $request) { 
        
        $categoria = Categoria::create([
            'nombre' => $request->nombre,
        ]);
        return redirect('/panel-control')->with('success', 'Categoría creada exitosamente!');
    }
}
