<?php

namespace Database\Factories;

use App\Models\Compra;
use App\Models\User;
use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    protected $model = Compra::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Crea un usuario si no se le pasa uno
            'direccion_id' => null,       // Lo calcularemos dinámicamente en el seeder
            'metodo_pago' => $this->faker->randomElement(['efectivo', 'transferencia', 'mercado_pago']),
            'retiro_sucursal' => $this->faker->boolean(30), // 30% de probabilidad de que sea retiro en sucursal
            'total' => 0, // Arranca en 0, lo sumaremos al meterle los detalles
            'estado' => $this->faker->randomElement(['pendiente', 'pagado', 'enviado']),
            'created_at' => $this->faker->dateTimeBetween('-2 months', 'now'), 
        ];
    }
}
