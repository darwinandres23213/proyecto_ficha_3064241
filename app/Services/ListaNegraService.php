<?php

namespace App\Services;

use App\Interfaces\ListaNegraInterface;
use Carbon\Carbon;

class ListaNegraService
{
    protected ListaNegraInterface $repository;

    public function __construct(ListaNegraInterface $repository)
    {
        $this->repository = $repository;
    }

    public function listar()
    {
        return $this->repository->getAll();
    }

    public function vetarCliente(array $datos)
    {
        // Regla: un cliente no puede tener dos vetos activos a la vez
        if ($this->repository->getActivaPorCliente($datos['cliente_id'])) {
            return null;
        }

        $datos['fecha_registro'] = Carbon::now();
        $datos['estado'] = 'activa';

        return $this->repository->create($datos);
    }

    public function levantarVeto(int $id)
    {
        $veto = $this->repository->getById($id);

        // Regla: solo se levanta un veto que siga activo
        if (!$veto || $veto->estado === 'levantada') {
            return null;
        }

        return $this->repository->update([
            'estado' => 'levantada',
            'fecha_fin' => Carbon::now(),
        ], $id);
    }

    public function clienteEstaVetado(int $clienteId): bool
    {
        return $this->repository->getActivaPorCliente($clienteId) !== null;
    }
}
