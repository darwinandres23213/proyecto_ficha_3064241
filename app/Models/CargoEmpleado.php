<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoEmpleado extends Model
{
    use HasFactory;

    protected $table = 'cargos_empleado';

    protected $fillable = [
        'empleado_id',
        'nombre',
        'descripcion',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
