<?php

namespace App\Services;

use App\Interfaces\CargoEmpleadoInterface;
use App\Models\CargoEmpleado;
use App\Repository\CargoEmpleadoRepository;
use DateTime;

class CargoEmpleadoService
{
    protected CargoEmpleadoRepository $cargoEmpleadoRepository;

    public function __construct(CargoEmpleadoRepository $cargoEmpleadoRepository)
    {
        $this->cargoEmpleadoRepository = $cargoEmpleadoRepository;
    }

    public function getAllCargos()
    {
        return $this->cargoEmpleadoRepository->getAll();
    }

    public function getCargoById($id)
    {
        return $this->cargoEmpleadoRepository->getById($id);
    }

    public function createCargo(array $data)
    {
        return $this->cargoEmpleadoRepository->create($data);
    }

    public function updateCargo(array $data, $id)
    {
        return $this->cargoEmpleadoRepository->update($data, $id);
    }

    public function deleteCargo($id)
    {
        return $this->cargoEmpleadoRepository->delete($id);
    }

    public function getCargoByNombre(string $nombre)
    {
        return $this->cargoEmpleadoRepository->getByNombre($nombre);
    }

    public function getCargoByEmpleado(int $empleadoId)
    {
        return $this->cargoEmpleadoRepository->getByEmpleado($empleadoId);
    }

    public function getCargoByDescripcion(string $palabraClave)
    {
        return $this->cargoEmpleadoRepository->getByDescripcion($palabraClave);
    }

    public function getCargoObtenerByFechaAsignacion(DateTime $fecha, string $turno): array
    {
        return $this->cargoEmpleadoRepository->getObtenerByFechaAsignacion($fecha, $turno);
    }
}
