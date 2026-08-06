<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'Ventas'; // hola  

    protected $fillable = [
        'ClienteId',
        'EmpleadoId',
        'MesaId',
        'PromocionId',
        'NumeroFactura',
        'FechaVenta',
        'Subtotal',
        'Descuento',
        'Total',
        'Estado',
    ];

    protected $casts = [
        'FechaVenta' => 'datetime',
        'Subtotal'   => 'decimal:2',
        'Descuento'  => 'decimal:2',
        'Total'      => 'decimal:2',
    ];



    // ─── Relaciones ───────────────────────────────────────────────

    /**
     * Cliente asociado a la venta (opcional).
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ClienteId');   git 
    }
  
    /**
     * Empleado que registró la venta.
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'EmpleadoId');
    }

    /**
     * Mesa vinculada a la venta (opcional).
     */
    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'MesaId');
    }

    /**
     * Promoción aplicada a la venta (opcional).
     */
    public function promocion()
    {
        return $this->belongsTo(Promocion::class, 'PromocionId');
    }

    /**
     * Líneas de detalle de esta venta.
     */
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'VentaId');
    }

    /**
     * Pagos registrados para esta venta.
     */
    public function pagos()
    {
        return $this->hasMany(Pago::class, 'VentaId');
    }

    /**
     * Devoluciones asociadas a esta venta.
     */
    public function devoluciones()
    {
        return $this->hasMany(Devolucion::class, 'VentaId');
    }
}
