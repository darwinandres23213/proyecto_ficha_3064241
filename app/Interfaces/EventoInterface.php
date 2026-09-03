<?php

namespace App\Interfaces;

use App\Interfaces\BaseInterface;

interface EventoInterface extends BaseInterface
{
    public function buscarPorNombre(string $nombre);
    public function buscarPorAforo(int $aforo);
}