<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoryController extends Controller
{
    public function create(Request $request) { 
        // Traemos los productos de la DB, paginados de a 12 por página.
        // Opcional: puedes agregar un where() si solo quieres mostrar productos con stock.
        $categorias = Categoria::all();
        
        // Retornamos la vista y le pasamos la variable $var_productos
        // usando compact() para que Blade pueda leerla.
        $categoriasEliminadas = Categoria::onlyTrashed()->get();
        return view('crear-categoria', compact('categorias', 'categoriasEliminadas'));
    }

    public function store(Request $request) { 
        
        $categoria = Categoria::create([
            'nombre' => $request->nombre,
        ]);
        return redirect('/panel-control')->with('success', 'Categoría creada exitosamente!');
    }
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias,nombre,' . $id,
        ]);

        $categoria->update($datosValidados);

        return redirect()->back()->with('success', 'Categoría modificada correctamente.');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->back()->with('success', 'Categoría eliminada correctamente.');
    }
    public function restore($id)
    {
        // Buscamos el registro únicamente entre los eliminados y lo restauramos
        $categoria = Categoria::onlyTrashed()->findOrFail($id);
        $categoria->restore();

        return redirect()->back()->with('success', 'Categoría reactivada y devuelta al catálogo con éxito.');
    }
}
