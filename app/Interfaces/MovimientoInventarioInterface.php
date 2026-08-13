<?php

namespace App\Interfaces;

interface MovimientoInventarioInterface extends BaseInterface 
{

    public function existeStockSuficiente(int $productoId, float $cantidad); 
    public function calcularValorTotalInventario(int $almacenId); 
    public function generarReporteMovimientos(string $fechaInicio, string $fechaFin); 
    
}