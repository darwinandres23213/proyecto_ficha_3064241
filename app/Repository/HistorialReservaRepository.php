<?php

namespace App\Repository;

use App\Interfaces\HistorialReservaInterface;
use App\Models\HistorialReserva;

class HistorialReservaRepository extends BaseRepository implements HistorialReservaInterface
{
    public function __construct(HistorialReserva $historial)
    {
        parent::__construct($historial);
    }

    public function getByReservaId(int $reserva_id)
    {
        return $this->model->where('reserva_id', $reserva_id)->get();
    }

}