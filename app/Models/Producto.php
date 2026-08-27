<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'categoria_id',
        'proveedor_id',
        'codigo',
        'nombre',
        'descripcion',
        'precio_venta',
        'precio_compra',
        'unidad_medida',
        'estado',
    ];

    protected $casts = [
        'precio_venta' => 'decimal:2',
        'precio_compra' => 'decimal:2',
        'estado' => 'boolean',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'categoria_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'producto_id');
    }

    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class, 'producto_id');
    }

    public function movimientosInventario()
    {
        return $this->hasMany(MovimientoInventario::class, 'producto_id');
    }
}
