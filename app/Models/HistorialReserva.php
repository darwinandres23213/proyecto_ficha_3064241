<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory, SoftDeletes;

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
        return $this->belongsTo(Reserva::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

}
