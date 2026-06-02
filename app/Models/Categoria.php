<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nombre'])]
class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categorias';

    public function productos(): HasMany{
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}
