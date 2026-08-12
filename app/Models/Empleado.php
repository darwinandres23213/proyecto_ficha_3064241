<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'usuario_id',
        'documento',
        'nombres',
        'apellidos',
        'cargo',
        'fecha_ingreso',
        'salario',
        'estado',
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
        'salario' => 'decimal:2',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function cargoEmpleado()
    {
        return $this->hasOne(CargoEmpleado::class, 'empleado_id');
    }

    public function personalSeguridad()
    {
        return $this->hasOne(PersonalSeguridad::class, 'empleado_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'empleado_id');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'empleado_id');
    }

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class, 'empleado_id');
    }

    public function devoluciones()
    {
        return $this->hasMany(Devolucion::class, 'empleado_id');
    }

    public function historialReservas()
    {
        return $this->hasMany(HistorialReserva::class, 'empleado_id');
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class, 'empleado_id');
    }

    public function listasNegras()
    {
        return $this->hasMany(ListaNegra::class, 'empleado_id');
    }

    public function ordenesCompra()
    {
        return $this->hasMany(OrdenCompra::class, 'empleado_id');
    }

    public function movimientosInventario()
    {
        return $this->hasMany(MovimientoInventario::class, 'empleado_id');
    }

    public function objetosPerdidos()
    {
        return $this->hasMany(ObjetoPerdido::class, 'empleado_id');
    }
}
