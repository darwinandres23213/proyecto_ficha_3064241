<?php

namespace App\Services;

use App\Interfaces\PersonalSeguridadInterface;

class PersonalSeguridadService
{
    public function __construct(
        private PersonalSeguridadInterface $personalSeguridadRepository
    ) {}

    public function getByPorTurno(string $turno)
    {
        return $this->personalSeguridadRepository->getByPorTurno($turno);
    }

    public function getByEmpresa(string $empresa)
    {
        return $this->personalSeguridadRepository->getByEmpresa($empresa);
    }

    public function getByCargo(string $cargo)
    {
        return $this->personalSeguridadRepository->getByCargo($cargo);
    }
}
