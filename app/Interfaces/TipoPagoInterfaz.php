<?php

namespace App\Interfaces;

interface TipoPagoInterface extends BaseInterface
{
    public function getActivos();

    public function cambiarEstado(int $id, bool $estado);
}