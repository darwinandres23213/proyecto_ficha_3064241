<?php

namespace App\Services;

use App\Interfaces\DjArtistaInterface; // Importa la interfaz DjArtistaInterface para poder usarla en el servicio
use Illuminate\Support\Facades\DB; // Se pueden hacer consultas más complejas con DB si es necesario

class DjArtistaService
{
    public function __construct( 
        private DjArtistaInterface $djArtistaRepository // Inyección de dependencia del modelo DjArtista, permite acceder a la base de datos a través del modelo
    ) {
    }
  
    public function getByGeneroMusical(string $generoMusical)
    {
        return $this->djArtistaRepository->getByGeneroMusical($generoMusical);
    }

    public function getByNombreArtistico(string $nombreArtistico)
    {
        return $this->djArtistaRepository->getByNombreArtistico($nombreArtistico);
    }

    public function getByNombreReal(string $nombreReal)
    {
        return $this->djArtistaRepository->getByNombreReal($nombreReal);
    }
}

