<?php

namespace App\Interfaces;

interface MovimientoInventarioInterface extends BaseInterface 
{
    public function obtenerStockActual(integer $datos);
    gitpublic function obtenerMovimientosPorAlmacen(int $almacenId);
    public function obtenerMovimientosPorFecha(string $fecha);

}