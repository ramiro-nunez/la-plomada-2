<?php

namespace App\Http\Controllers;
use App\Models\Contacto; 
use Illuminate\View\View;
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
        // 1. Validamos los datos que entran del formulario
        $datosValidados = $request->validate([
            'nombre'   => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'email'    => 'required|email|max:100',
            'telefono' => 'nullable|numeric',
            'asunto'   => 'required|string|max:100',
            'mensaje'  => 'required|string|max:2000',
        ]);

        // 2. Guardamos la consulta en la tabla 'contactos'
        $contacto = Contacto::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
        ]);
        
        // 3. Mantenemos tu lógica de retornar la vista de éxito con los datos
        return view('exito-contacto', [ 
            'nombre' => $datosValidados['nombre'], 
            'email'  => $datosValidados['email'],
        ]);
    }
    
    public function consultas(Request $request) { 
        
        $contactos = Contacto::all();
        
        return view('contacto', compact('contactos'));
    }
}
