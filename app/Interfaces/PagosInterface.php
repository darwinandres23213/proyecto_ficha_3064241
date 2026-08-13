<?php

namespace App\Interfaces;

use DateTime;

interface PagoInterface extends BaseInterface
{
    public function getByFecha(DateTime $fecha_pago);
    public function TieneReferencia();
    public function ObtenerEstado();    
    public function VerificacionDePago(array $detalledepago);
}
