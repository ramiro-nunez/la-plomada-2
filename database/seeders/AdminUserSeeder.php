<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
//sarasa sarasa
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->nombre = 'Super';
        $admin->apellido = 'Admin'; 
        $admin->email = 'laplomada@gmail.com';
        $admin->password = Hash::make('contrasenia123');
        $admin->rol = 'admin'; 
        $admin->save();
    }
}
