<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleVenta extends Model

{
    use HasFactory,SoftDeletes;


    protected $table = "detalle_ventas";
    protected $fillable = [
        'id',
        'venta_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
        'created_at',
        'updated_at'

    ];
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
    public function producto()
    {
        return $this->HasMany(Producto::class);
    }


}
