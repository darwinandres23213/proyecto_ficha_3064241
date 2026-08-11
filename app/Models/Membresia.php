<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Membresia extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada (opcional si sigue la convención plural,
     * pero se deja explícito por claridad).
     */
    protected $table = 'membresias';

    /**
     * Atributos asignables masivamente.
     */
    protected $fillable = [
        'id_cliente',
        'tipo_membresia',
        'puntos_acumulados',
        'fecha_inicio',
        'fecha_vencimiento',
        'estado',
        'beneficios',
    ];

    /**
     * Conversión automática de tipos.
     */
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_vencimiento' => 'date',
        'puntos_acumulados' => 'integer',
    ];

    /**
     * Una membresía
