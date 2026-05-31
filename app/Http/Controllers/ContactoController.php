<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Procesa los datos del formulario de contacto y muestra la vista de éxito,
     * a la cual tambien le pasa los datos del usuario.
     *
     * @param  Request  $request  Los datos enviados por el usuario.
     * @return View 'exito-contacto'
     */
    public function procesar(Request $request) { 
        $nombre = $request->input('nombre'); 
        $email = $request->input('email'); 
        
        return view('exito-contacto', [ 'nombre' => $nombre, 'email' => $email ]);
    }
}
