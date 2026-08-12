<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';

    protected $fillable = [
        'cliente_id',
        'evento_id',
        'codigo',
        'tipo',
        'precio',
        'fecha_compra',
        'fecha_uso',
        'estado',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'fecha_compra' => 'datetime',
        'fecha_uso' => 'datetime',
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
