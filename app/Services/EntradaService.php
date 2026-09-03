<?php

namespace App\Services;

use App\Interfaces\EntradaInterface;

class EntradaService
{
    public function __construct(
        private EntradaInterface $entradaRepository
    ) {}

    public function getByCodigo(string $codigo)
    {
        return $this->entradaRepository->getByCodigo($codigo);
    }

    public function getByEvento(int $eventoId)
    {
        return $this->entradaRepository->getByEvento($eventoId);
    }

    public function getByCliente(int $clienteId)
    {
        return $this->entradaRepository->getByCliente($clienteId);
    }
}