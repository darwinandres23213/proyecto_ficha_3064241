<?php

namespace App\Repositories;

use App\Interfaces\EntradaInterface;
use App\Models\Entrada;

class EntradaRepository extends BaseRepository implements EntradaInterface
{
    public function __construct(Entrada $entrada)
    {
        parent::__construct($entrada);
    }

    public function getByCodigo(string $codigo)
    {
        return $this->model
            ->where('codigo', $codigo)
            ->first();
    }

    public function getByEvento(int $eventoId)
    {
        return $this->model
            ->where('evento_id', $eventoId)
            ->get();
    }

    public function getByCliente(int $clienteId)
    {
        return $this->model
            ->where('cliente_id', $clienteId)
            ->get();
    }
}
