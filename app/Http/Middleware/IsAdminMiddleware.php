<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificamos que esté logueado Y que su rol sea exactamente 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        
        return redirect('/')->with('error', 'Acceso denegado. Se requieren permisos de administrador.');
    }
}
