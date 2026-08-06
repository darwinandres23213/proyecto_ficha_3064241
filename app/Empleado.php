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

    /**
     * Relación: Un empleado pertenece a un usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}