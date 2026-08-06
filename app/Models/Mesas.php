<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mesas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mesas';

    protected $fillable = [
        'nombre',
        'capacidad',
        'estado',
    ];

    public function reservas()
    {
        return $this->hasMany(Reservas::class, 'mesa_id');
    }

    public function getEstadoAttribute($value)
    {
        return $value ? 'Disponible' : 'Ocupada';
    }

    public function zona()
    {
        return $this->belongsTo(Zonas::class, 'zona_id');
    }
}

