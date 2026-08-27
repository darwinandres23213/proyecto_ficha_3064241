<?php

namespace App\Interfaces;

interface VentaInterface extends BaseInterface
{
    // Obtener una venta por su número de factura único
    public function getByNumeroFactura(string $numeroFactura);

    // Obtener ventas dentro de un rango de fechas
    public function getByRangoFechas(string $fechaInicio, string $fechaFin);

    // Obtener el total facturado (suma de 'total') dentro de un rango de fechas
    public function getTotalFacturadoEnPeriodo(string $fechaInicio, string $fechaFin): float;
}
