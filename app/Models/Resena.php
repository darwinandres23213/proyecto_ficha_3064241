<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    // Relaciones
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
}