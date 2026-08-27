<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    protected $fillable = [
        'cliente_id',
        'empleado_id',
        'mesa_id',
        'promocion_id',
        'numero_factura',
        'fecha_venta',
        'subtotal',
        'descuento',
        'total',
        'estado',
    ];

    protected $casts = [
        'fecha_venta' => 'datetime',
        'subtotal' => 'decimal:2',
        'descuento' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'mesa_id');
    }

    public function promocion()
    {
        return $this->belongsTo(Promocion::class, 'promocion_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'venta_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'venta_id');
    }

    public function devoluciones()
    {
        return $this->hasMany(Devolucion::class, 'venta_id');
    }
}
