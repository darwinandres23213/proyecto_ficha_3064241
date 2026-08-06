<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObjetoPerdido extends Model
{
    use HasFactory, SofteDeletes;

    protected $table = 'objetos_perdidos';

    protected $fillable = [
        'mesa_id',
        'nombre_objeto',
        'descripcion',
        'lugar_encontrado',
        'fecha_encontrado',
        'estado',
    ];

    protected $casts = [
        'fecha_encontrado' => 'datetime',
    ];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }
}
