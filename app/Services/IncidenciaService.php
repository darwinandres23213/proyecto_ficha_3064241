<?php

namespace App\Services;

use App\Interfaces\IncidenciaInterface;

class IncidenciaService
{
    public function __construct(
        private IncidenciaInterface $incidenciaRepository
    ) {}

    public function getAll()
    {
        return $this->incidenciaRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->incidenciaRepository->getById($id);
    }

    public function create(array $datos)
    {
        return $this->incidenciaRepository->create($datos);
    }

    public function update(array $datos, int $id)
    {
        return $this->incidenciaRepository->update($datos, $id);
    }

    public function delete(int $id)
    {
        return $this->incidenciaRepository->delete($id);
    }

    public function getByEstado(string $estado)
    {
        return $this->incidenciaRepository->getByEstado($estado);
    }

    public function getByZona(int $zonaId)
    {
        return $this->incidenciaRepository->getByZona($zonaId);
    }

    public function getByEmpleado(int $empleadoId)
    {
        return $this->incidenciaRepository->getByEmpleado($empleadoId);
    }
}

     


