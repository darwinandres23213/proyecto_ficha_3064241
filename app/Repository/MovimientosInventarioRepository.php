<?php

namespace App\Repository;

use App\Interfaces\MovimientoInventarioInterface;
use App\Models\MovimientoInventario;
use App\Models\Inventario;

class MovimientosInventarioRepository extends BaseRepository implements MovimientoInventarioInterface
{
    public function __construct(MovimientoInventario $movimientoInventario)
    {
        parent::__construct($movimientoInventario);
    }

    public function existeStockSuficiente(int $productoId, float $cantidad)
    {
        $stockActual = Inventario::where('producto_id', $productoId)->sum('cantidad');

        return $stockActual >= $cantidad;
    }

    public function calcularValorTotalInventario(int $almacenId)
    {
        return Inventario::where('almacen_id', $almacenId)
            ->join('productos', 'inventario.producto_id', '=', 'productos.id')
            ->selectRaw('SUM(inventario.cantidad * productos.precio) as valor_total')
            ->value('valor_total') ?? 0;
    }

    public function generarReporteMovimientos(string $fechaInicio, string $fechaFin)
    {
        return $this->model
            ->with(['producto', 'empleado'])
            ->whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->orderBy('fecha', 'desc')
            ->get();
    }
}