<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['user_id', 'total', 'estado'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detalles(){
        return $this->hasMany(DetalleCompra::class, 'compra_id');
    }
}
