<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCarrito extends Model
{
    protected $table = 'detalle_carritos';

    protected $fillable = ['carrito_id', 'var_productos_id', 'cantidad'];

    public function carrito(){
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }

    public function varProducto(){
        return $this->belongsTo(Var_producto::class, 'var_productos_id');
    }
}
