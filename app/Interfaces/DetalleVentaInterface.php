<?php 

namespace App\Interfaces;

interface DetalleVentaInterface extends BaseInterface
{
    public function getFindCantidad(int $cantidad);
    public function getFindPrecioUnitario(float $precio_unitario);
    public function getFindSubtotal(float $subtotal);
}