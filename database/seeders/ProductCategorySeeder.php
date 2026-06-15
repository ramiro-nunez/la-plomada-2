<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria = new Categoria();
        $categoria->nombre = 'Cania';
        $categoria->save();

        $categoria1 = new Categoria();
        $categoria1->nombre = 'Reel';
        $categoria1->save();

        $categoria2 = new Categoria();
        $categoria2->nombre = 'Anzuelo';
        $categoria2->save();

        $categoria3 = new Categoria();
        $categoria3->nombre = 'Plomada';
        $categoria3->save();
    }
}
