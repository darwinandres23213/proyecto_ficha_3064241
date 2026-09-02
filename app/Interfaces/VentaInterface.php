<?php

namespace App\Interfaces;

interface VentaInterface extends BaseInterface
{
    public function cambiarEstado(int $id, string $estado); // Cambiar estado de la venta: abierta | pagada | anulada
    public function calcularTotal(int $id); // Calcular el total de la venta aplicando descuento al subtotal
    public function anular(int $id); // Anular una venta registrada
}

// hola
