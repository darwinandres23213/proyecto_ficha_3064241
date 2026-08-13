<?php

namespace App\Interfaces;

use DateTime;

interface ObjetoPerdidoInterface extends BaseInterface
{
    public function getByNombre(string $nombre);

    public function getByFecha(DateTime $fecha);

    public function getByEstado(string $estado);
}