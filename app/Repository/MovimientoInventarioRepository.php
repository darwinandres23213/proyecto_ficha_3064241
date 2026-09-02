<?php

namespace App\Repository;

use App\Interfaces\MovimientoInventarioInterface;
use App\Models\MovimientoInventario;
use App\Models\Producto;

class MovimientoInventarioRepository extends BaseRepository implements MovimientoInventarioInterface
{
    public function __construct(MovimientoInventario $model)
    {
        parent::__construct($model);
    }

    public function existeStockSuficiente(int $productoId, float $cantidad)
    {
        $producto = Producto::find($productoId);

        if (!$producto) {
            return false;
        }

        return $producto->stock >= $cantidad;
    }

    public function calcularValorTotalInventario(int $almacenId)
    {
        return Producto::where('almacen_id', $almacenId)
            ->get()
            ->sum(function ($producto) {
                return $producto->stock * $producto->precio_unitario;
            });
    }

    public function generarReporteMovimientos(string $fechaInicio, string $fechaFin)
    {
        return $this->model
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->get();
    }
}