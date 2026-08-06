<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Usuario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "usuarios";

    protected $fillable = [
        'nombres',
        'apellidos',
        'edad',
        'genero',
        'email',
        'password',
        'id_rol'
    ];


    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function empleado()
    {
         return $this->hasOne(Empleado::class);
    }


}
