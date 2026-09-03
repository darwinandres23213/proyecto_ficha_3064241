<?php

namespace App\Interfaces;

interface ReservaInterface extends BaseInterface
{
    public function getState(string $estado);
    public function getByEvento(int $eventoId);
    public function getByEmpleado(int $empleadoId);
   public function getObtenerByDisponibilidad(DateTime $fecha, int $cantidadPersonas): array;



}
