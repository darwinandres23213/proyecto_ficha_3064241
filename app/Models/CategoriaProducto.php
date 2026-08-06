<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaProducto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "categorias_producto";

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];

    public function Producto()
    {
        return $this->hasMany(Producto::class);
    }
}
 