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
<<<<<<< HEAD
        $admin->name = 'Super';
        $admin->lastname = 'Admin'; 
        $admin->email = 'laplomada@gmail.com';
        $admin->password = Hash::make('contrasenia123');
        $admin->role = 'admin'; 
=======
        $admin->nombre = 'Super';
        $admin->apellido = 'Admin'; 
        $admin->email = 'laplomada@gmail.com';
        $admin->password = Hash::make('contrasenia123');
        $admin->rol = 'admin'; 
>>>>>>> 68c3408720858583e1773ff8fee632dbcd4bafef
        $admin->save();
    }
}
