<?php

namespace App\Services;

use App\Interfaces\PromocionInterface;
use Carbon\Carbon;

class PromocionService
{
    private PromocionInterface $promocionRepository;

    public function __construct(PromocionInterface $promocionRepository)
    {
        $this->promocionRepository = $promocionRepository;
    }

    public function findByStatusPromocion(bool $statusPromocion)
    {
        return $this->promocionRepository->findByStatusPromocion($statusPromocion);
    }

    public function findByFechaInicio(Carbon $fechaInicio)
    {
        return $this->promocionRepository->findByFechaInicio($fechaInicio);
    }

    public function aplicarPromocion(int $promocionId, float $precio)
    {
        return $this->promocionRepository->aplicarPromocion($promocionId, $precio);
    }
}
