<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialReserva extends Model
{
    use HasFactory;

    protected $table = 'historial_reservas';

    protected $fillable = [
        'reserva_id',
        'empleado_id',
        'accion',
        'estado_anterior',
        'estado_nuevo',
        'observaciones',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
