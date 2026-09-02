<?php

namespace App\Interfaces;

interface MesaInterface extends BaseInterface
{
    public function getByEstado(string $estado);

    public function getByZona(int $zona_id);
}
