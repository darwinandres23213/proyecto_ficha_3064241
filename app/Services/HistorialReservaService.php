<?php

namespace App\Services;

use App\Interfaces\HistorialReservaInterface;

class HistorialReservaService
{
    public function __construct(
        private HistorialReservaInterface $historialReservaRepository
    ) {
    }

    public function getByReservaId(int $reserva_id)
    {
        return $this->historialReservaRepository->getByReservaId($reserva_id);
    }
}