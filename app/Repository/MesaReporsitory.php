<?php

namespace App\Repository;

use App\Interfaces\MesaInterface;
use App\Models\Mesa;
use Override;

class MesaRepository extends BaseRepository implements MesaInterface
{
    public function __construct(Mesa $mesa)
    {
        parent::__construct($mesa);
    }

    public function getByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }

    public function getByZona(int $zona_id)
    {
        return $this->model->where('zona_id', $zona_id)->get();
    }
}
