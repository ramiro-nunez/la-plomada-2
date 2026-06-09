<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable(['id_producto', 'descripcion', 'precio', 'stock', 'url_img'])]
class Var_producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'var_productos';

    // Cada variante pertenece a un producto
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }
}
