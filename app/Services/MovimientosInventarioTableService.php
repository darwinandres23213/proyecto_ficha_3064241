<?php

namespace App\Services;

use App\Interfaces\MovimientoInventarioInterface;

class MovimientosInventarioTableService
{
    public function __construct(
        private MovimientoInventarioInterface $movimientoInventarioRepository
    ) {
    }

    /**
     * Valida y procesa un reporte de movimientos dentro de un rango de fechas.
     */
    public function obtenerReporteTabla(string $fechaInicio, string $fechaFin)
    {
        return $this->movimientoInventarioRepository->generarReporteMovimientos($fechaInicio, $fechaFin);
    }

    /**
     * Consulta el valor total acumulado del inventario de un almacén.
     */
    public function obtenerValorTotal(int $almacenId)
    {
        return $this->movimientoInventarioRepository->calcularValorTotalInventario($almacenId);
    }

    /**
     * Valida si es posible realizar un descuento de stock.
     */
    public function validarDisponibilidad(int $productoId, float $cantidad): bool
    {
        return $this->movimientoInventarioRepository->existeStockSuficiente($productoId, $cantidad);
    }
}