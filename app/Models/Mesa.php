<?php

namespace App\Models; // inicio

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $table = 'mesas';


    protected $fillable = [
        'zona_id',
        'numero',
        'capacidad',
        'tipo',
        'estado',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'mesa_id');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'mesa_id');
    }
} // hola profe
