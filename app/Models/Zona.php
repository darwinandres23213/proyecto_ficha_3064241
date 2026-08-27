<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    protected $table = 'zonas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'aforo_maximo',
        'precio_cover',
        'estado',
    ];

    protected $casts = [
        'precio_cover' => 'decimal:2',
        'estado' => 'boolean',
    ];

    public function mesas()
    {
        return $this->hasMany(Mesa::class, 'zona_id');
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'zona_id');
    }

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class, 'zona_id');
    }

    public function objetosPerdidos()
    {
        return $this->hasMany(ObjetoPerdido::class, 'zona_id');
    }
}
