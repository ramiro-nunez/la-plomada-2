<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DetalleCompra extends Model
{
    use hasFactory;
    protected $table = 'detalle_compras';

    protected $fillable = ['compra_id', 'var_productos_id', 'cantidad', 'precio_unitario'];

    public function compra(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    public function varProducto(){
        return $this->belongsTo(Var_producto::class, 'var_productos_id');
    }
}
