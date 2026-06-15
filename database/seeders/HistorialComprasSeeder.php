<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Direccion;
use App\Models\Compra;
use App\Models\DetalleCompra;

class HistorialComprasSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Creamos un usuario de prueba fijo para loguearte en la-plomada-2.test
        $usuarioFijo = User::firstOrCreate(
            ['email' => 'antonio@gmail.com'],
            [
                'name' => 'Antonio',
                'apellido' => 'García',
                'password' => bcrypt('antoniolaravel'), // Contraseña de prueba
            ]
        );

        // Le creamos una dirección a este usuario por si elige envío a domicilio
        $direccionFija = Direccion::create([
            'user_id' => $usuarioFijo->id,
            'provincia' => 'Corrientes',
            'ciudad' => 'Corrientes Capital',
            'codigo_postal' => '3400',
            'calle' => 'Av. Centenario',
            'altura' => '1420'
        ]);

        // Generamos 5 compras para tu usuario fijo
        $this->crearComprasParaUsuario($usuarioFijo, $direccionFija, 5);


        // 2. OPCIONAL: Creamos 3 usuarios aleatorios más con 2 compras cada uno para poblar la BD
        User::factory(3)->create()->each(function ($user) {
            $direccion = Direccion::create([
                'user_id' => $user->id,
                'provincia' => 'Corrientes',
                'ciudad' => 'Paso de los Libres',
                'codigo_postal' => '3230',
                'calle' => 'Colon',
                'altura' => '450'
            ]);
            $this->crearComprasParaUsuario($user, $direccion, 2);
        });
    }

    /**
     * Función auxiliar para generar las compras, inyectar detalles y calcular el total real.
     */
    private function crearComprasParaUsuario($usuario, $direccion, $cantidadCompras)
    {
        Compra::factory($cantidadCompras)->create([
            'user_id' => $usuario->id
        ])->each(function ($compra) use ($direccion) {
            
            // Si la compra generada por el factory NO es retiro en sucursal, le asociamos la dirección
            if (!$compra->retiro_sucursal) {
                $compra->update(['direccion_id' => $direccion->id]);
            }

            // Le creamos entre 1 y 3 productos (detalles) a esta compra concreta
            $detalles = DetalleCompra::factory($img = rand(1, 3))->create([
                'compra_id' => $compra->id
            ]);

            // Calculamos matemáticamente el total sumando (cantidad * precio_unitario) de sus detalles
            $totalCompra = $detalles->sum(function ($detalle) {
                return $detalle->cantidad * $detalle->precio_unitario;
            });

            // Actualizamos la cabecera de la compra con el total real calculado
            $compra->update(['total' => $totalCompra]);
        });
    }
}
