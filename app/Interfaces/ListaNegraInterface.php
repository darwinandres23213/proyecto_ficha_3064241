<?php

namespace App\Interfaces;

use App\Interfaces\BaseInterface;

interface ListaNegraInterface extends BaseInterface
{
    public function getByCliente(int $clienteId);
    public function getByEstado(string $estado);
    public function getActivaPorCliente(int $clienteId);
}
