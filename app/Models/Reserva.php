<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'cliente_id',
        'mesa_id',
        'evento_id',
        'empleado_id',
        'fecha_reserva',
        'cantidad_personas',
        'anticipo',
        'observaciones',
        'estado',
    ];

    protected $casts = [
        'fecha_reserva' => 'datetime',
        'anticipo' => 'decimal:2',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'mesa_id');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function historialReservas()
    {
        return $this->hasMany(HistorialReserva::class, 'reserva_id');
    }
}
