<?php

namespace App\Repository;
use App\Interfaces\DjArtistaInterface;
use App\Models\DjArtista;

class DjArtistaRepository extends BaseRepository implements DjArtistaInterface
{
    public function __construct(DjArtista $model)
    {
        parent::__construct($model);
    }

    public function getByGeneroMusical(string $generoMusical)
    {
        return $this->model->where('genero_musical', $generoMusical)->get();
    }

    public function getByNombreArtistico(string $nombreArtistico)
    {
        return $this->model->where('nombre_artistico', $nombreArtistico)->get();
    }

    public function getByNombreReal(string $nombreReal)
    {
        return $this->model->where('nombre_real', $nombreReal)->get();
    }
}

