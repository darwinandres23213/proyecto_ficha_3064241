<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model

{
    use HasFactory, SoftDeletes;

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

    public function usuario()

    {
        return $this->belongsTo(Usuario::class);
    }
}
