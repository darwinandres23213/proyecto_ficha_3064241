<?php

namespace App\Repository;

use App\Interfaces\PersonalSeguridadInterface;
use App\Models\PersonalSeguridad;

class PersonalSeguridadRepository extends BaseRepository implements PersonalSeguridadInterface
{
    public function __construct(PersonalSeguridad $personalSeguridad)
    {
        parent::__construct($personalSeguridad);
    }

    public function getByTurno(string $turno)
    {
        return $this->model
            ->where('turno', $turno)
            ->get();
    }

    public function getByEmpresa(string $empresa)
    {
        return $this->model
            ->where('empresa_seguridad', $empresa)
            ->get();
    }

    public function getByCargo(string $cargo)
    {
        return $this->model
            ->where('cargo', $cargo)
            ->get();
    }
}
