<?php

namespace App\Interfaces;

interface HistorialReservaInterface extends BaseInterface
{
    public function getByReservaId(int $reserva_id); // Define the method signature for getting historial reservas by reserva_id
}