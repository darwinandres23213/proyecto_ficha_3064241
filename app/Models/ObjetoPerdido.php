<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetoPerdido extends Model
{
    use HasFactory;

    protected $table = 'objetos_perdidos';

    protected $fillable = [
        'zona_id',
        'empleado_id',
        'cliente_id',
        'nombre_objeto',
        'descripcion',
        'lugar_encontrado',
        'fecha_encontrado',
        'estado',
    ];

    protected $casts = [
        'fecha_encontrado' => 'datetime',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
