<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoryController extends Controller
{
    public function create(Request $request) { 
        $categorias = Categoria::orderBy('created_at', 'desc')->get();
        
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
