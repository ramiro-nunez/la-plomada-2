<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Var_producto;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        $rubros = ['Plomadas', 'Anzuelos', 'Reeles', 'Cañas de Pesca'];

        foreach ($rubros as $nomCat) {
            $categoria = Categoria::create([
                'nombre' => $nomCat
            ]);

            for ($i = 1; $i <= fake()->numberBetween(3, 5); $i++) {
                $producto = Producto::create([
                    'id_categoria' => $categoria->id,
                    'nombre' => $categoria->nombre . ' ' . fake()->word(),
                ]);

                // Creamos variantes (ej: diferentes pesos o tamaños)
                $opciones = ['Chico', 'Mediano', 'Grande'];
                $precioBase = fake()->randomFloat(2, 600, 4500);

                foreach ($opciones as $index => $desc) {
                    Var_producto::create([
                        'id_producto' => $producto->id,
                        'descripcion' => $desc,
                        'precio' => $precioBase + ($index * 400),
                        'stock' => fake()->numberBetween(10, 60),
                        'url_img' => null, 
                    ]);
                }
            }
        }
    }
}