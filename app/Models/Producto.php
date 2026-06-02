<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    public function categoria():BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
    public function variantes():HasMany
    {
        return $this->hasMany(Variante::class, 'id_producto');
    }


}
