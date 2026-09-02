<?php

namespace App\Repository;

use App\Interfaces\ObjetoPerdidoInterface;
use App\Models\ObjetoPerdido;
use DateTime;
use Override;

class ObjetoPerdidoRepository extends BaseRepository implements ObjetoPerdidoInterface
{
    public function __construct(ObjetoPerdido $objetoPerdido)
    {
        parent::__construct($objetoPerdido);
    }

    public function getByNombre(string $nombre_objeto)
    {
        return $this->model
            ->where('nombre_objeto', $nombre_objeto)
            ->get();
    }

 
    public function getByFecha(DateTime $fecha_encontrado)
    {
        return $this->model
            ->whereDate('fecha_encontrado', $fecha_encontrado->format('Y-m-d'))
            ->get();
    }


    public function getByEstado(string $estado)
    {
        return $this->model
            ->where('estado', $estado)
            ->get();
    }
}
