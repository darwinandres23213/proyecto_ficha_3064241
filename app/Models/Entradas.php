<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = "entradas";

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

     public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}

