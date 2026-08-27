<?php

namespace App\Interfaces;

interface HistorialReservaInterface extends BaseInterface
{
    public function getByReservaId(int $reserva_id);
}