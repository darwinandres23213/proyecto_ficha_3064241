<?php

namespace App\Interfaces;

use DateTime;

interface PagoInterface extends BaseInterface
{
    public function getByFecha(DateTime $fecha_pago);

    public function TieneReferencia(?string $referencia);

    public function ObtenerEstado(int $pago_id);

    public function VerificacionDePago(array $detalledepago);
}
