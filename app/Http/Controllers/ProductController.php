<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request) { 
        
        return view('crear-producto');
    }
    
    public function store(Request $request) { 
        
        $producto = Producto::create([
            'descripcion' => $request->descripcion,
        ]);
        return redirect('/panel-control')->with('success', 'Producto creada exitosamente!');
    }
}
