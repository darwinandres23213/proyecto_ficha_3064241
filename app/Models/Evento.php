<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'eventos';
    protected $fillable = [

        'zonas_id',
        'dj_artistas_id',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'aforo',
        'precio_entrada',
        'estado',

    ];

    public function DjArtista(){
        return $this->belongsTo(DjArtista::class);
    }

    public function Zona () {
        return $this->belongsTo(Zona::class);
    }

    public function Mesa () {
        return $this->hasMany(Mesa::class);
    }

    public function Empleado () {
        return $this->hasMany(Empleado::class);
    }

    public function Cliente () {
        return $this->hasMany(Cliente::class);
    }

    public function Entrada () {
        return $this->hasMany(Entrada::class);
    }

    public function Resena (){
        return $this->hasMany(Resena::class);
    }

    public function Promocion () {
        return $this->hasMany(Promocion::class);
    }

}
