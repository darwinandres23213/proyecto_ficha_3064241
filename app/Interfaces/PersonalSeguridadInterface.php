<?php

namespace App\Interfaces;

interface PersonalSeguridadInterface extends BaseInterface
{
    public function getByPorTurno(string $turno); 

    public function getByEmpresa(string $empresa);

    public function getByCargo(string $cargo);
} 
