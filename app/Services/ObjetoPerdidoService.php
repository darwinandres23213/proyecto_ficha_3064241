<?php

namespace App\Services;

use App\Interfaces\ObjetoPerdidoInterface;
use DateTime;

class ObjetoPerdidoService
{
    public function __construct(
        private ObjetoPerdidoInterface $objetosPerdidosRepository
    ) {
    }

    public function getByNombre(string $nombre_objeto)
    {
        return $this->objetoPerdidoRepository
            ->getByNombre($nombre_objeto);
    }

    public function getByFecha(DateTime $fecha_encontrado)
    {
        return $this->objetoPerdidoRepository
            ->getByFecha($fecha_encontrado);
    }

    public function getByEstado(string $estado)
    {
        return $this->objetoPerdidoRepository
            ->getByEstado($estado);
    }
}
