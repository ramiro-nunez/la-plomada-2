<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // 1. Obtenemos el usuario que acaba de iniciar sesión
        $user = $request->user();
        // 2. Armamos el mensaje usando comillas dobles para que PHP lea las variables por dentro
        $mensaje = "¡Bienvenido de nuevo {$user->name} {$user->apellido}! Preparamos las mejores ofertas para vos.";
        // 3. Lo mandamos con la misma variable 'bienvenida' que configuramos en tu HTML antes
        return redirect('/panel-control')->with('status', $mensaje);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
