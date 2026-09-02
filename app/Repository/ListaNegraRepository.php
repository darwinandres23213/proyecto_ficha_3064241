<?php

namespace App\Repository;

use App\Interfaces\ListaNegraInterface;
use App\Models\ListaNegra;

class ListaNegraRepository extends BaseRepository implements ListaNegraInterface
{
    public function __construct(ListaNegra $listaNegra)
    {
        parent::__construct($listaNegra);
    }

    public function getByCliente(int $clienteId)
    {
        return $this->model->where('cliente_id', $clienteId)->get();
    }

    public function getByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }

    public function getActivaPorCliente(int $clienteId)
    {
        return $this->model
            ->where('cliente_id', $clienteId)
            ->where('estado', 'activa')
            ->first();
    }
}
