<?php

namespace App\Repository;

use App\Interfaces\TipoPagoInterface;
use App\Models\TipoPago;

class TipoPagosRepository extends BaseRepository implements TipoPagoInterface
{
    public function __construct(TipoPago $tipoPago)
    {
        parent::__construct($tipoPago);
    }

    public function getActivos()
    {
        return $this->model
            ->where('estado', true)
            ->get();
    }

    public function cambiarEstado(int $id, bool $estado)
    {
        return $this->update(
            ['estado' => $estado],
            $id
        );
    }
    // cambios hechos por anderson
}