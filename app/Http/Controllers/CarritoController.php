<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass; // Importamos la clase genérica de PHP
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use App\Models\Var_producto;

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
        // Busca si el usuario ya tiene un carrito. 
        // Si lo tiene, lo trae. Si no lo tiene, lo CREA en la tabla 'carritos' automáticamente.
        $carrito = Carrito::firstOrCreate([
            'user_id' => $user->id
        ]);
        // Buscamos la variante elegida en la DB para conocer su stock máximo actual
        $variante = Var_producto::findOrFail($request->var_productos_id);
        // 3. Verificar si esta variante de producto YA ESTABA en el carrito de este usuario
        $detalleExistente = DetalleCarrito::where('carrito_id', $carrito->id)
            ->where('var_productos_id', $request->var_productos_id)
            ->first();

        // Averiguamos cuánto ya tiene acumulado en el carrito (si no tiene, es 0)
        $cantidadEnCarritoActual = $detalleExistente ? $detalleExistente->cantidad : 0;
    
        // Calculamos cuánto stock real le queda disponible a este cliente en esta sesión
        $stockPermitidoParaSumar = $variante->stock - $cantidadEnCarritoActual;
    
        // Si lo que intenta agregar ahora supera lo que queda disponible, lo frenamos en seco
        if ($request->cantidad > $stockPermitidoParaSumar) {
            return redirect()->back()->withErrors([
                'cantidad' => "No podés agregar esa cantidad. Ya tenés {$cantidadEnCarritoActual} u. en el carrito y el stock total disponible es de {$variante->stock} u."
            ])->withInput(); 
            // Nota: Si usás sweetalert o un modal, podés redirigir with('error', 'Mensaje...')
        }
    
        // 3. Modificar o crear el detalle (Tu lógica original intacta)
        if ($detalleExistente) {
            // Si ya existía el producto en el carrito, solo le sumamos la nueva cantidad
            $detalleExistente->cantidad += $request->cantidad;
            $detalleExistente->save();
        } else {
            // Si es un producto nuevo en el carrito, creamos el registro en 'detalle_carritos'
            DetalleCarrito::create([
                'carrito_id' => $carrito->id,
                'var_productos_id' => $request->var_productos_id,
                'cantidad' => $request->cantidad
            ]);
        }

        // 4. Redireccionamos al usuario a la vista del carrito para que vea lo que sumó
        return redirect()->route('carrito.ver')->with('success', '¡Producto sumado al carrito!');
    }

    public function eliminarProducto($detalleId)
    {
        // Buscamos el detalle del carrito por su ID
        $detalle = DetalleCarrito::find($detalleId);

        // Verificamos que el detalle exista y que pertenezca al carrito del usuario logueado
        if ($detalle && $detalle->carrito->user_id == auth()->id()) {
            $detalle->delete(); // Eliminamos el detalle del carrito
            return redirect()->route('carrito.ver')->with('success', '¡Producto eliminado del carrito!');
        }

        return redirect()->route('carrito.ver')->with('error', 'No se pudo eliminar el producto del carrito.');
    }
}