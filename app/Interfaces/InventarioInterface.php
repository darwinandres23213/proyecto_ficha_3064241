<?php

namespace App\Interfaces;

interface InventarioInterface extends BaseInterface
{
    public function getByProductoId(int $producto_id);
    public function getStockByUbicacion(string $ubicacion);
    public function transferirInventario(
        int $producto_id,
        string $ubicacionOrigen,
        string $ubicacionDestino,
        int $cantidad
    );
}
