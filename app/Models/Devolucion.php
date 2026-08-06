<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(Venta::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
        
    }
}