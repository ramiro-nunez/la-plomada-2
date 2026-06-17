<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Var_producto;
use App\Models\Producto;

class VariantController extends Controller
{
    public function create(Request $request) { 
        
        // Traemos los productos de la DB, paginados de a 12 por página.
        // Opcional: puedes agregar un where() si solo quieres mostrar productos con stock.
        $productos = Producto::all();
        $variantes = Var_producto::orderBy('created_at', 'desc')->get();
        
        $variantesEliminadas = Var_producto::onlyTrashed()->with('producto')->get();
        // Retornamos la vista y le pasamos la variable $variantes
        // usando compact() para que Blade pueda leerla.
        return view('crear-variante', compact('variantes', 'productos', 'variantesEliminadas'));
    }
    public function restore($id)
    {
        // Buscamos el registro únicamente entre los eliminados y lo restauramos
        $variante = Var_Producto::onlyTrashed()->findOrFail($id);
        $variante->restore();

        return redirect()->back()->with('success', 'Variante reactivada y devuelta al catálogo con éxito.');
    }
    public function store(Request $request) { 

        $request->validate([
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'url_img' => 'required|image|mimes:jpeg,jpg|max:2048', // máx 2MB
        ]);
        
        $var_producto = Var_producto::create([
            'id_producto' => $request->id_producto,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
        ]);
        
        if ($request->hasFile('url_img')) {
        
        // La magia de Laravel: toma el archivo, lo renombra con un ID único hashes 
        // para evitar colisiones de nombres y lo guarda en storage/app/public/productos
        $path = $request->file('url_img')->store('productos', 'public');
        
        // $path ahora contiene un string automático como: "productos/abc123xyz.jpg"
        $var_producto->url_img = $path; 
        $var_producto->save();
        }
        
        return redirect('/crear-variante')->with('success', 'Variante de producto creada exitosamente!');
    }

    public function editar(Request $request, $id) { 

        $var_producto = Var_producto::findOrFail($id);

        return view('editar-variante', compact('var_producto'));
    }

    public function update(Request $request, $id)
    {
    // 1. Buscamos el producto en la DB (si no existe, lanza error 404 automático)
    $var_producto = Var_producto::findOrFail($id);
    
    
    
    // 2. Validamos los datos (lo ideal es usar un FormRequest, pero lo resumo aquí)
    $datosValidados = $request->validate([
        'descripcion' => 'nullable|string|max:255',
        'precio' => 'nullable|numeric|min:0',
        'stock' => 'nullable|integer|min:0',
        'url_img' => 'nullable|image|mimes:jpeg,jpg|max:2048',
    ]);
    
    // Esto evita que si el usuario no completó un input, se guarde vacío en la BD
    $datosFiltrados = array_filter($datosValidados, function ($value) {
        return $value !== null;
    });

    // 3. Manejo especial de la imagen: Solo si el usuario subió un archivo nuevo
    if ($request->hasFile('url_img')) {
        $path = $request->file('url_img')->store('productos', 'public');
        $datosFiltrados['url_img'] = $path;
    }

    // 4. Actualizamos la base de datos SOLO con los campos que sí se ingresaron
    $var_producto->update($datosFiltrados);
    
    // 4. Redirigimos de vuelta a la tabla con un mensaje de éxito
    return redirect('/crear-variante')->with('success', 'Producto actualizado correctamente.');
    }
    
    public function destroy($id)
    {
        // 1. Buscamos el artículo en la base de datos
        $var_producto = Var_producto::findOrFail($id);
        
        // 2. Ejecutamos el comando de borrado
        $var_producto->delete();
        
        // 3. Recargamos la página enviando el mensaje flash a la sesión
        return redirect('/crear-variante')->with('success', 'El artículo fue eliminado de forma permanente.');
    }
}
