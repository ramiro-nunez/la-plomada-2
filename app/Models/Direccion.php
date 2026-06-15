<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    // Definimos la tabla en plural para evitar líos con el idioma
    protected $table = 'direcciones';

    // Agregamos los campos permitidos para la asignación masiva
    protected $fillable = [
        'user_id',
        'provincia',
        'ciudad',
        'codigo_postal',
        'calle',
        'altura'
    ];

    /**
     * Una dirección pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}