<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'detalle_carritos';

    protected $fillable = ['compra_id', 'var_producto_id', 'cantidad', 'precio_unitario'];

    public function compra(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    public function varProducto(){
        return $this->belongsTo(Var_producto::class, 'var_producto_id');
    }
}
