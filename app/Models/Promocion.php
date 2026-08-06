<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocion extends Model
{
    protected $table= "promociones";

    protected $fillable = [
            'nombre',
            'descripcion',
           'tipo_descuento',
            'valor_descuento',
            'fecha_inicio',
            'fecha_fin',
            'estado',
    ];

    public function evento()
    {
        return  $this->belongsTo(Evento::class);
    }

    public function ventas()
    {
    return $this->hasMany(Venta::class);
    }
}
