<?php

namespace App\Interfaces;

interface EntradaInterface extends BaseInterface
{
    // Métodos específicos de Entrada 

    public function getByCodigo(string $codigo);

    public function getByEvento(int $eventoId);

    public function getByCliente(int $clienteId);
}