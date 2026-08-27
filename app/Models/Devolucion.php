<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    use HasFactory;

    protected $table = 'devoluciones';

    protected $fillable = [
        'venta_id',
        'empleado_id',
        'motivo',
        'monto_devuelto',
        'metodo_reembolso',
        'estado',
        'fecha_devolucion',
    ];

    protected $casts = [
        'monto_devuelto' => 'decimal:2',
        'fecha_devolucion' => 'datetime',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
