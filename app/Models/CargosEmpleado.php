<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CargosEmpleado extends Model
{
    use HasFactory, SoftDeletes;

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
