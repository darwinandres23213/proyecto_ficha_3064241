<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class DjArtista extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'djs_artistas';

    protected $fillable = [
        'nombre_artistico',
        'nombre_real',
        'genero_musical',
        'biografia',
        'contacto',
        'cache_base',
        'estado'
    ];

    public function eventos()
    {
        return $this->HasMany(Evento::class, 'dj_artistas_id'); // Revisar relación con la tabla eventos
    }
}
