<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function panel(Request $request) { 
        
        $usuarios = User::all();
        
        return view('usuarios', compact('usuarios'));
    }

    public function crear(Request $request) { 
        
        return view('crear-articulo');
    }

    public function update(Request $request, $id)
    {
    // 1. Buscamos el producto en la DB (si no existe, lanza error 404 automático)
    $user = User::findOrFail($id);
    
    // 2. Validamos los datos (lo ideal es usar un FormRequest, pero lo resumo aquí)
    $datosValidados = $request->validate([
        'rol' => 'required|in:admin,customer',
    ]);
    
    // 3. ACTUALIZAMOS LA BASE DE DATOS (Asignación Directa)
    // En lugar de usar ->update(), asignamos la propiedad manualmente y luego guardamos.    
    $user->rol = $datosValidados['rol'];
    $user->save();

    // 4. Redirigimos de vuelta a la tabla con un mensaje de éxito
    return redirect('usuarios')->with('success', 'Rol actualizado correctamente.');
    }
}
