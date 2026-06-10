<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto = new Producto();
        $producto->id_categoria = 1;
        $producto->nombre = 'Caña1';
        $producto->save();

        $producto1 = new Producto();
        $producto1->id_categoria = 2;
        $producto1->nombre = 'Reel1';
        $producto1->save();

        $producto2 = new Producto();
        $producto2->id_categoria = 3;
        $producto2->nombre = 'Anzuelo1';
        $producto2->save();

        $producto3 = new Producto();
        $producto3->id_categoria = 4;
        $producto3->nombre = 'Plomada1';
        $producto3->save();
    }
}
