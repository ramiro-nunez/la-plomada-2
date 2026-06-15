<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Direccion;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function confirmar(Request $request)
    {
        // 1. VALIDACIÓN: Adaptamos las reglas según el método de envío
        $reglas = [
            'retiro_sucursal' => 'required|boolean',
            'metodo_pago'     => 'required|string',
        ];

        // Si es '0' (Envío a domicilio), los campos de dirección pasan a ser obligatorios
        if ($request->input('retiro_sucursal') == '0') {
            $reglas['provincia']     = 'required|string|max:100';
            $reglas['ciudad']        = 'required|string|max:100';
            $reglas['codigo_postal'] = 'required|string|max:20';
            $reglas['calle']         = 'required|string|max:150';
            $reglas['altura']        = 'required|string|max:20';
        }

        $request->validate($reglas);

        $user = auth()->user();

        // 2. OBTENER EL CARRITO: Traemos los detalles y el precio actual de la variante del producto
        $carrito = Carrito::where('user_id', $user->id)
            ->with('detalles.varProducto')
            ->first();

        if (!$carrito || $carrito->detalles->isEmpty()) {
            return redirect()->route('carrito.ver')->with('error', 'El carrito está vacío.');
        }

        // 3. TRANSACCIÓN: Procesamos la compra de forma segura
        $compraId = DB::transaction(function () use ($request, $user, $carrito) {
            
            $direccionId = null;

            // Si va a domicilio, registramos la dirección primero
            if ($request->retiro_sucursal == '0') {
                $direccion = Direccion::create([
                    'user_id'       => $user->id,
                    'provincia'     => $request->provincia,
                    'ciudad'        => $request->ciudad,
                    'codigo_postal' => $request->codigo_postal,
                    'calle'         => $request->calle,
                    'altura'        => $request->altura,
                ]);
                $direccionId = $direccion->id; // Guardamos el ID generado
            }

            // Calcular el monto total sumando el precio vigente de las variantes hoy
            $totalCalculado = $carrito->detalles->sum(function ($detalle) {
                return $detalle->cantidad * $detalle->varProducto->precio; 
            });

            // Crear la cabecera de la Compra
            $compra = Compra::create([
                'user_id'         => $user->id,
                'direccion_id'    => $direccionId, // Puede ser el ID o null si retira en sucursal
                'metodo_pago'     => $request->metodo_pago,
                'retiro_sucursal' => $request->retiro_sucursal,
                'total'           => $totalCalculado,
                'estado'          => 'pendiente', 
            ]);

            // Copia los productos del Carrito a los Detalles de la Compra (CONGELANDO PRECIO)
            foreach ($carrito->detalles as $itemCarrito) {
                DetalleCompra::create([
                    'compra_id'        => $compra->id,
                    'var_productos_id' => $itemCarrito->var_productos_id,
                    'cantidad'         => $itemCarrito->cantidad,
                    'precio_unitario'  => $itemCarrito->varProducto->precio, // <-- CONGELADO
                ]);

                $itemCarrito->varProducto->decrement('stock', $itemCarrito->cantidad);
            }

            // 4. VACIAR EL CARRITO: Borramos las líneas temporales del cliente
            $carrito->detalles()->delete();

            return $compra->id;
        });

        // Redireccionar al usuario a una vista de éxito o historial
        return redirect()->route('catalogo.index')->with('success', "¡Pedido #{$compraId} confirmado con éxito! Pronto nos comunicaremos.");
    }
}