<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguridad extends Model
{
    use HasFactory;

    protected $table = 'seguridad';

    protected $fillable = [
        'empleado_id',
        'empresa_seguridad',
        'cargo',
        'turno',
        'licencia',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
