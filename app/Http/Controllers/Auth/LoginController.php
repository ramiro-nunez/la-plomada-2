<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de login.
     */
    public function create()
    {
        // Asumiendo que tu archivo es resources/views/login.blade.php
        return view('iniciar-sesion'); 
    }

    /**
     * Procesa el intento de inicio de sesión.
     */
    public function store(LoginRequest $request)
    {
        // Auth::attempt busca el email y compara el hash del password automáticamente
        if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Si falla, lanzamos una excepción de validación que Laravel captura 
            //y devuelve automáticamente a la vista con los errores.
            throw ValidationException::withMessages([
                'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ]);
        }
        $request->session()->regenerate();
        
        if (Auth::user()->role === 'admin') {
        // Redirige al panel de administrador
        return redirect()->intended('/panel-control')->with('success', 'Has iniciado sesión correctamente.'); 
        }
        // redirect()->intended() redirige al usuario a la URL que intentaba acceder 
        // antes de ser forzado a loguearse, o al home ('/') por defecto.
        return redirect()->intended('/')->with('success', 'Has iniciado sesión correctamente.');
    }
    
    /**
     * Destruye la sesión autenticada (Logout).
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        
        // Invalidar la sesión actual y regenerar el token CSRF por seguridad
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}
