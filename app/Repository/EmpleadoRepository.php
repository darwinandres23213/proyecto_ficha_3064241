<?php

namespace App\Repository;

use App\Interfaces\EmpleadoInterface;
use App\Models\Empleado;
use Carbon\CarbonInterface;

class EmpleadoRepository extends BaseRepository implements EmpleadoInterface
{
    public function __construct(Empleado $empleado)
    {
        parent::__construct($empleado);
    }

    public function findByFechaIngreso(CarbonInterface $fecha_ingreso)
    {
        return $this->model->where('fecha_ingreso', $fecha_ingreso)->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }

    public function findByCargo(string $cargo)
    {
        return $this->model->where('cargo', $cargo)->get();
    }
}
