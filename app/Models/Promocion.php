<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $table = 'promociones';

    protected $fillable = [
        'evento_id',
        'nombre',
        'descripcion',
        'tipo_descuento',
        'valor_descuento',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

    protected $casts = [
        'valor_descuento' => 'decimal:2',
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'estado' => 'boolean',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'promocion_id');
    }
}
