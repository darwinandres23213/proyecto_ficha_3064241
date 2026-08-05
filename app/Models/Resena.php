<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    use HasFactory;

    protected $table = 'resenas';

    protected $fillable = [
        'cliente_id',
        'evento_id',
        'calificacion',
        'comentario',
        'respuesta_admin',
        'estado',
    ];

    protected $casts = [
        'calificacion' => 'integer',
    ];

    /**
     * Cliente que dejó la reseña.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Evento reseñado.
     */
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
