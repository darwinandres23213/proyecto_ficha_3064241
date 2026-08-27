<?php

namespace App\Repository;

use App\Interfaces\VentaInterface;
use App\Models\Venta;

class VentaRepository extends BaseRepository implements VentaInterface
{
    public function __construct(Venta $model)
    {
        parent::__construct($model);
    }

    public function getByNumeroFactura(string $numeroFactura)
    {
        return $this->model->where('numero_factura', $numeroFactura)->first();
    }

    public function getByRangoFechas(string $fechaInicio, string $fechaFin)
    {
        return $this->model
            ->whereBetween('fecha_venta', [$fechaInicio, $fechaFin])
            ->get();
    }

    public function getTotalFacturadoEnPeriodo(string $fechaInicio, string $fechaFin): float
    {
        return (float) $this->model
            ->whereBetween('fecha_venta', [$fechaInicio, $fechaFin])
            ->sum('total');
    }
}

