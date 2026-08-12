<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'zona_id',
        'dj_artista_id',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'aforo',
        'precio_entrada',
        'estado',
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'precio_entrada' => 'decimal:2',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');
    }

    public function djArtista()
    {
        return $this->belongsTo(DjArtista::class, 'dj_artista_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'evento_id');
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'evento_id');
    }

    public function promociones()
    {
        return $this->hasMany(Promocion::class, 'evento_id');
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class, 'evento_id');
    }
}
