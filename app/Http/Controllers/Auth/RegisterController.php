<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('registro-usuario'); 
    }
    /**
     * Maneja la petición de registro de un nuevo cliente.
     */
    public function store(RegisterRequest $request)
    {
        // 1. Crear el usuario (Mass Assignment seguro gracias a $fillable)
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            // Hasheamos la contraseña antes de guardarla
            'password' => Hash::make($request->password), 
        ]);
        
        // 2. Opcional: Autenticar al usuario inmediatamente
        Auth::login($user);
        
        // 3. Redirigir a la home con un mensaje de bienvenida
        return redirect('/')->with('success', '¡Bienvenido a la tienda!');
    }
}
