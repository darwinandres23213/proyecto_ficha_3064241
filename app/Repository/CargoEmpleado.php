<?php

namespace App\Repository;

use App\Interfaces\CargoEmpleadoInterface;
use App\Models\CargoEmpleado;
use DateTime;

class CargoEmpleadoRepository extends BaseRepository implements CargoEmpleadoInterface
{
    public function __construct(CargoEmpleado $model)
    {
        parent::__construct($model);
    }

    public function getByNombre(string $nombre)
    {
        return $this->model->where('nombre', 'LIKE', "%{$nombre}%")->get();
    }

    public function getByEmpleado(int $empleadoId)
    {
        return $this->model->where('empleado_id', $empleadoId)->get();
    }

    public function getByDescripcion(string $palabraClave)
    {
        return $this->model->where('descripcion', 'LIKE', "%{$palabraClave}%")->get();
    }

    public function getObtenerByFechaAsignacion(DateTime $fecha, string $turno): array
    {
        return $this->model->whereDate('created_at', $fecha->format('Y-m-d'))
            ->get()
            ->toArray();
    }
}
