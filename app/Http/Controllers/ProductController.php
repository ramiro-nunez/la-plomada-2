<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request) { 
        $categorias = Categoria::all();
        $productos = Producto::orderBy('created_at', 'desc')->get();
        $productosEliminados = Producto::onlyTrashed()->get();


        // Retornamos la vista y le pasamos la variable $var_productos
        // usando compact() para que Blade pueda leerla.

        return view('crear-producto', compact('categorias', 'productos', 'productosEliminados'));
    }
    
    public function store(Request $request) { 
        
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'id_categoria' => $request->id_categoria,
        ]);
        return redirect('/panel-control')->with('success', 'Producto creado exitosamente!');
    }
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:100|unique:productos,nombre,' . $id,
        ]);

        $producto->update($datosValidados);

        return redirect()->back()->with('success', 'Producto modificado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->back()->with('success', 'Producto eliminado correctamente.');
    }
    public function restore($id)
    {
        // Buscamos el registro únicamente entre los eliminados y lo restauramos
        $producto = Producto::onlyTrashed()->findOrFail($id);
        $producto->restore();

        return redirect()->back()->with('success', 'Producto reactivado y devuelto al catálogo con éxito.');
    }
}
