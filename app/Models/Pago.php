<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'venta_id',
        'tipo_pago_id',
        'monto',
        'referencia',
        'fecha_pago',
        'estado',
    ];

    protected $casts = [
        'monto' => 'decimal:2',
        'fecha_pago' => 'datetime',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class, 'tipo_pago_id');
    }
}
