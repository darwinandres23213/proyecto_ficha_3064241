<?php

namespace App\Interfaces;

use App\Interfaces\BaseInterface;

interface EventoInterface extends BaseInterface
{
    public function calcularRecaudo(int $aforo, float $precio_entrada);
    public function buscarPorNombre(string $nombre);
    public function buscarPorAforo(int $aforo);
}