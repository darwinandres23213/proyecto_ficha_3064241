<?php

namespace App\Interfaces;

interface PromocionInterface extends BaseInterface
{
    public function findByStatusPromocion(bool $statusPromocion);
    public function finByFechaInicio (datetime $fechaInicio);
    public function aplicarPromocion(int $promocionId, float $precio);
}
