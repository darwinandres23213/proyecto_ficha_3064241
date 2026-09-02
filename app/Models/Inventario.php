<?php

namespace App\Models; //inicio

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventarios';

    protected $fillable = [
        'producto_id',
        'stock_actual',
        'stock_minimo',
        'ubicacion',
        'ultima_entrada',
        'ultima_salida',
    ];

    protected $casts = [
        'ultima_entrada' => 'datetime',
        'ultima_salida' => 'datetime',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
