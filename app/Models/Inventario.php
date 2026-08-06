<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
        use HasFactory, SoftDeletes;

    protected $table = "inventarios";

    protected $fillable = [
        'producto_id',
        'stock_actual',
        'stock_minimo',
        'ubicacion',
        'ultima_entrada',
        'ultima_salida',
    
    ];


    public function producto()
    {
     return $this->hasMany(producto::class);
    }

}   

