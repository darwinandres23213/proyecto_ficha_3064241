<?php

namespace App\Interfaces;

interface ZonaInterface extends BaseInterface
{
    public function findByNombreZona(string $nombreZona);
    public function findByAforoMaximo(int $aforoMaximo);
    public function findByPrecioCover(double $precioCover);

}