<?php

namespace App\Repository;

use App\Interfaces\IncidenciaInterface;
use App\Models\Incidencia;

class IncidenciaRepository extends BaseRepository implements IncidenciaInterface
{
    public function __construct(Incidencia $incidencia)
    {
        parent::__construct($incidencia);
    }

    public function getByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }

    public function getByZona(int $zonaId)
    {
        return $this->model->where('zona_id', $zonaId)->get();
    }

    public function getByEmpleado(int $empleadoId)
    {
        return $this->model->where('empleado_id', $empleadoId)->get();
    }
}




