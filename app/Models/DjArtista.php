<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DjArtista extends Model
{
    use HasFactory;

    protected $table = 'djs_artistas';

    protected $fillable = [
        'nombre_artistico',
        'nombre_real',
        'genero_musical',
        'biografia',
        'contacto',
        'cache_base',
        'estado',
    ];

    protected $casts = [
        'cache_base' => 'decimal:2',
        'estado' => 'boolean',
    ];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'dj_artista_id');
    }
}
