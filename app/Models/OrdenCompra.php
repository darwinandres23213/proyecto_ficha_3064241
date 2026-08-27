<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;

    protected $table = 'ordenes_compra';

    protected $fillable = [
        'proveedor_id',
        'empleado_id',
        'numero_orden',
        'fecha',
        'total',
        'estado',
        'observaciones',
    ];

    protected $casts = [
        'fecha' => 'datetime',
        'total' => 'decimal:2',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
