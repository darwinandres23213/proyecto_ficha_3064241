<?php

namespace App\Interfaces;

interface PromocionInterface extends BaseInterface
{
    public function findByStatusPromocion(boolean $statusPromocion);
    public function finByFechaInicio (datetime $fechaInicio);
    public function aplicarPromocion(int $promocionId, float $precio);
}
