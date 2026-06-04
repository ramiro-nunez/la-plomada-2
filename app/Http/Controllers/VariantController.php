<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Var_producto;

class VariantController extends Controller
{
    public function create(Request $request) { 
        
        return view('crear-variante');
    }
    
    public function store(Request $request) { 
        
        $var_producto = Var_producto::create([
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
        ]);
        return redirect('/panel-control')->with('success', 'Variante de producto creada exitosamente!');
    }

    public function index()
    {
        // Traemos los productos de la DB, paginados de a 12 por página.
        // Opcional: puedes agregar un where() si solo quieres mostrar productos con stock.
        $var_productos = Var_producto::paginate(12);
        
        // Retornamos la vista y le pasamos la variable $var_productos
        // usando compact() para que Blade pueda leerla.
        return view('panel-control', compact('var_productos'));
    }
    
    public function update(Request $request, $id)
    {
    // 1. Buscamos el producto en la DB (si no existe, lanza error 404 automático)
    $var_producto = Var_producto::findOrFail($id);
    
    // 2. Validamos los datos (lo ideal es usar un FormRequest, pero lo resumo aquí)
    $datosValidados = $request->validate([
        'descripcion' => 'required|string|max:255',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ]);
    
    // 3. Actualizamos la base de datos
    $var_producto->update($datosValidados);
    
    // 4. Redirigimos de vuelta a la tabla con un mensaje de éxito
    return redirect()->back()->with('success', 'Producto actualizado correctamente.');
    }
    
    public function destroy($id)
    {
        // 1. Buscamos el artículo en la base de datos
        $var_producto = Var_producto::findOrFail($id);
        
        // 2. Ejecutamos el comando de borrado
        $var_producto->delete();
        
        // 3. Recargamos la página enviando el mensaje flash a la sesión
        return redirect()->back()->with('success', 'El artículo fue eliminado de forma permanente.');
    }
}
