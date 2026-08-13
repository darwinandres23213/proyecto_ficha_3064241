<?php

namespace App\Interfaces;

interface DjArtistaInterface extends BaseInterface
{
    public function getByGeneroMusical(string $generoMusical);
    public function getByNombreArtistico(string $nombreArtistico);
    public function getByNombreReal(string $nombreReal);
}