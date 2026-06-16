<?php

namespace Database\Factories;

use App\Models\DetalleCompra;
use App\Models\Compra;
use App\Models\Var_Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleCompraFactory extends Factory
{
    protected $model = DetalleCompra::class;

    public function definition(): array
    {
        // Agarramos una variante al azar de las que ya insertaste con tus seeders de productos
        $variante = Var_Producto::inRandomOrder()->first() ?? Var_Producto::factory()->create();

        return [
            'compra_id' => Compra::factory(),
            'var_productos_id' => $variante->id,
            'cantidad' => $this->faker->numberBetween(1, 4),
            'precio_unitario' => $variante->precio, // Congelamos el precio de la variante
        ];
    }
}
