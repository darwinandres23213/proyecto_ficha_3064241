<?php

namespace App\Interfaces;

interface IncidenciaInterface extends BaseInterface
{
    public function getByEstado(string $estado);
    public function getByZona(int $zonaId);
    public function getByEmpleado(int $empleadoId);
}



