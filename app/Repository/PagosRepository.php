<?php

namespace App\Repository;

use App\Interfaces\PagoInterface;
use App\Models\Pago;

class PagoRepository extends BaseRepository implements PagoInterface
{
    public function __construct(Pago $pago)
    {
        parent::__construct($pago);
    }

    public function getByFecha(\DateTime $fecha_pago): ?array
    {
        return $this->model
            ->whereDate('fecha_pago', $fecha_pago->format('Y-m-d'))
            ->get()
            ->toArray();
    }

    public function TieneReferencia(?string $referencia): bool
    {
        return $this->model
            ->where('referencia', $referencia)
            ->exists();
    }

    public function ObtenerEstado(int $pago_id): string
    {
        return $this->model
            ->where('id', $pago_id)
            ->value('estado');
    }

    public function VerificacionDePago(array $detalledepago): bool
    {
        return $this->model
            ->where('venta_id', $detalledepago['venta_id'])
            ->where('monto', $detalledepago['monto'])
            ->where('estado', 'exitoso')
            ->exists();
    }
}
