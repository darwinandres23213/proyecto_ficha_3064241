<?php

namespace App\Interfaces;

use DateTime;

interface CargoEmpleadoInterface extends BaseInterface
{
    public function getByNombre(string $nombre);

    public function getByEmpleado(int $empleadoId);

    public function getByDescripcion(string $palabraClave);

    public function getObtenerByFechaAsignacion(DateTime $fecha, string $turno): array;
}
