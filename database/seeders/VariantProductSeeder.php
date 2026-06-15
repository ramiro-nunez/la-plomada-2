<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Var_producto;

class VariantProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $var_producto = new Var_producto();
        $var_producto->id_producto = 1;
        $var_producto->descripcion = 'Descripción de la caña 1';
        $var_producto->precio = 156000.00;
        $var_producto->stock = 10;
        $var_producto->url_img = 'fish-icon.jpg';
        $var_producto->save();

        $var_producto1 = new Var_producto();
        $var_producto1->id_producto = 2;
        $var_producto1->descripcion = 'Descripción del reelin 1';
        $var_producto1->precio = 121000.00;
        $var_producto1->stock = 5;
        $var_producto1->url_img = 'fish-icon.jpg';
        $var_producto1->save();

        $var_producto2 = new Var_producto();
        $var_producto2->id_producto = 3;
        $var_producto2->descripcion = 'Descripción del anzuelo 1';
        $var_producto2->precio = 10.00;
        $var_producto2->stock = 100;
        $var_producto2->url_img = 'fish-icon.jpg';
        $var_producto2->save();

        $var_producto3 = new Var_producto();
        $var_producto3->id_producto = 4;
        $var_producto3->descripcion = 'Descripción de la plomada 1';
        $var_producto3->precio = 5.00;
        $var_producto3->stock = 50;
        $var_producto3->url_img = 'fish-icon.jpg';
        $var_producto3->save();
    }
}
