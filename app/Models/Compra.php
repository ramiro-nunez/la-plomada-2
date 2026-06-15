<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'user_id',
        'direccion_id',
        'metodo_pago',
        'estado',
        'total',
        'retiro_sucursal'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detalles_compra(){
        return $this->hasMany(DetalleCompra::class, 'compra_id');
    }

    public function direccion(){
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }
}
