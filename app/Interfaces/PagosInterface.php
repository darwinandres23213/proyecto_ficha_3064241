<?php

namespace App\Interfaces;

use DateTime;

interface PagoInterface extends BaseInterface
{
    public function getByFecha(DateTime $fecha_pago): ?array;

    public function TieneReferencia(?string $referencia): bool;

    public function ObtenerEstado(int $pago_id): string;

    public function VerificacionDePago(array $detalledepago): bool;
}
