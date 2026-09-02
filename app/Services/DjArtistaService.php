<?php

namespace App\Services;

use App\Models\DjArtista;
use Illuminate\Support\Facades\DB;

class DjArtistaService
{
    public function __construct(
        private DjArtista $djArtista
    ) {
    }

    public function getByGeneroMusical(string $generoMusical)
    {
        return $this->djArtista->where('genero_musical', $generoMusical)->get();
    }

    public function getByNombreArtistico(string $nombreArtistico)
    {
        return $this->djArtista->where('nombre_artistico', $nombreArtistico)->get();
    }

    public function getByNombreReal(string $nombreReal)
    {
        return $this->djArtista->where('nombre_real', $nombreReal)->get();
    }
}

