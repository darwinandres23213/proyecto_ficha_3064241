<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Define el nombre de la tabla en la base de datos (opcional si sigue la convención plural de Laravel)
    protected $table = 'productos';

    // Campos permitidos para asignación masiva (Mass Assignment) a través de formularios o seeders
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categoria_id',
        'proveedor_id'
    ];

    /**
     * Relación: Un producto pertenece a una categoría.
     * Esto permite acceder a la categoría desde el producto (ej. $producto->categoria)
     */
    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'categoria_id');
    }

    /**
     * Relación: Un producto es suministrado por un proveedor.
     * Esto permite acceder al proveedor desde el producto (ej. $producto->proveedor)
     */
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}