<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'documento',
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'fecha_nacimiento',
        'tipo',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'cliente_id');
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'cliente_id');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'cliente_id');
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class, 'cliente_id');
    }

    public function listasNegras()
    {
        return $this->hasMany(ListaNegra::class, 'cliente_id');
    }

    public function objetosPerdidos()
    {
        return $this->hasMany(ObjetoPerdido::class, 'cliente_id');
    }
}
