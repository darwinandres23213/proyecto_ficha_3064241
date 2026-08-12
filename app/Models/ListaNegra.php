<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaNegra extends Model
{
    use HasFactory;

    protected $table = 'listas_negras';

    protected $fillable = [
        'cliente_id',
        'empleado_id',
        'motivo',
        'fecha_registro',
        'fecha_fin',
        'estado',
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
        'fecha_fin' => 'datetime',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
