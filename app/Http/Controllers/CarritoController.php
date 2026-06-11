<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass; // Importamos la clase genérica de PHP
use App\Models\Carrito;
use App\Models\DetalleCarrito;

class CarritoController extends Controller
{
    public function ver()
    {
        
        // Buscamos el carrito donde 'user_id' sea igual al ID del usuario logueado
        $carrito = Carrito::where('user_id', auth()->id())
            ->with('detalles.varProducto') // Cargamos sus relaciones en español
            ->first();

        // Si el usuario no tiene carrito todavía, mandamos null (el Blade ya sabe manejarlo)
        return view('carrito', compact('carrito'));
    }
    public function agregarProducto(Request $request) { 
        // 1. Validar que los datos que vienen del botón existan y sean correctos
        $datosValidados = $request->validate([
            'var_productos_id'   => 'required|string|max:255',
            'cantidad'   => 'required|numeric',
        ]);
        
        $user = auth()->user(); // Obtenemos el usuario logueado

        // 2. MAGIA DE LARAVEL: Busca si el usuario ya tiene un carrito. 
        // Si lo tiene, lo trae. Si no lo tiene, lo CREA en la tabla 'carritos' automáticamente.
        $carrito = Carrito::firstOrCreate([
            'user_id' => $user->id
        ]);

        // 3. Verificar si esta variante de producto YA ESTABA en el carrito de este usuario
        $detalleExistente = DetalleCarrito::where('carrito_id', $carrito->id)
            ->where('var_productos_id', $request->var_productos_id)
            ->first();

        if ($detalleExistente) {
            // Si ya existía el producto en el carrito, solo le sumamos la nueva cantidad
            $detalleExistente->cantidad += $request->cantidad;
            $detalleExistente->save();
        } else {
            // Si es un producto nuevo en el carrito, creamos el registro en 'detalle_carritos'
            DetalleCarrito::create([
                'carrito_id' => $carrito->id, // <- El ID que recuperamos o creamos en el paso 2
                'var_productos_id' => $request->var_productos_id,
                'cantidad' => $request->cantidad
            ]);
        }

        // 4. Redireccionamos al usuario a la vista del carrito para que vea lo que sumó
        return redirect()->route('carrito.ver')->with('success', '¡Producto sumado al carrito!');
    }
}