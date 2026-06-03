<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['id_categoria', 'nombre'])]
class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';

    // Un producto pertenece a una categoría
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id');
    }

    // Un producto tiene muchas variantes
    public function variantes(): HasMany
    {
        return $this->hasMany(Var_producto::class, 'id_producto', 'id');
    }
}
