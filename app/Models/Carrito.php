<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $fillable = ['user_id'];

    //un carrito pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    //un carrito puede tener muchos detalles
    public function detalles(){
        return $this->hasMany(DetalleCarrito::class, 'carrito_id');
    }
}
