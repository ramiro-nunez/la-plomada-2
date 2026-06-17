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
        // 1. VALIDACIÓN BÁSICA: Reglas según el método de envío
        $reglas = [
            'retiro_sucursal' => 'required|boolean',
            'metodo_pago'     => 'required|string',
        ];

        if ($request->input('retiro_sucursal') == '0') {
            $reglas['provincia']     = 'required|string|max:100';
            $reglas['ciudad']        = 'required|string|max:100';
            $reglas['codigo_postal'] = 'required|string|max:20';
            $reglas['calle']         = 'required|string|max:150';
            $reglas['altura']        = 'required|string|max:20';
        }

        $request->validate($reglas);

        $user = auth()->user();

        // 2. OBTENER EL CARRITO Y VALIDAR INTEGRIDAD (Existencia y Stock)
        $carrito = Carrito::where('user_id', $user->id)
            ->with('detalles.varProducto.producto')
            ->first();

        if (!$carrito || $carrito->detalles->isEmpty()) {
            return redirect()->route('carrito.ver')->with('error', 'El carrito está vacío.');
        }

        // Recorremos antes de la transacción para asegurarnos de que todo esté en regla
        foreach ($carrito->detalles as $detalle) {
            // Validación A: Si la variante se eliminó físicamente de la BD
            if (is_null($detalle->varProducto)) {
                // Opcional: Limpiamos el registro huérfano automáticamente para que no vuelva a joder
                $detalle->delete(); 
                
                return redirect()->route('carrito.ver')
                    ->with('error', 'Uno de los productos de tu carrito ya no está disponible. Lo hemos removido automáticamente.');
            }

            // Validación B: Control de Stock disponible
            if ($detalle->cantidad > $detalle->varProducto->stock) {
                $nombreProducto = $detalle->varProducto->producto->nombre ?? 'Producto';
                return redirect()->route('carrito.ver')
                    ->with('error', "El producto '{$nombreProducto}' no tiene suficiente stock disponible (Stock: {$detalle->varProducto->stock}).");
            }
        }

        // 3. TRANSACCIÓN: Si llegó acá, todo está OK. Procesamos la compra de forma segura
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
                $direccionId = $direccion->id;
            }

            // Calcular el monto total (ya sabemos que varProducto no es null)
            $totalCalculado = $carrito->detalles->sum(function ($detalle) {
                return $detalle->cantidad * $detalle->varProducto->precio; 
            });

            // Crear la cabecera de la Compra
            $compra = Compra::create([
                'user_id'         => $user->id,
                'direccion_id'    => $direccionId,
                'metodo_pago'     => $request->metodo_pago,
                'retiro_sucursal' => $request->retiro_sucursal,
                'total'           => $totalCalculado,
                'estado'          => 'pendiente', 
            ]);

            // Copiar los productos del Carrito a los Detalles de la Compra y descontar stock
            foreach ($carrito->detalles as $itemCarrito) {
                DetalleCompra::create([
                    'compra_id'        => $compra->id,
                    'var_productos_id' => $itemCarrito->var_productos_id,
                    'cantidad'         => $itemCarrito->cantidad,
                    'precio_unitario'  => $itemCarrito->varProducto->precio, // Congelamos precio
                ]);

                // Descontamos del stock de la variante
                $itemCarrito->varProducto->decrement('stock', $itemCarrito->cantidad);
            }

            // 4. VACIAR EL CARRITO: Borramos las líneas temporales del cliente
            $carrito->detalles()->delete();

            return $compra->id;
        });

        // Redireccionar al usuario con mensaje de éxito
        return redirect()->route('carrito.ver')
            ->with('success', "¡Pedido #{$compraId} confirmado con éxito! Pronto nos comunicaremos.");
    }
    public function historial()
    {
        // Traemos las compras del usuario logueado con todas sus relaciones anidadas
        $compras = Compra::where('user_id', auth()->id())
            ->with(['detalles_compra.varProducto.producto', 'direccion'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mis-compras', compact('compras'));
    }
}