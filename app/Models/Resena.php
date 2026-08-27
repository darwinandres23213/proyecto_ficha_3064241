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

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
