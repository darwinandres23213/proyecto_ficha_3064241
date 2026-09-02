<?php

namespace App\Repository;

use App\Interfaces\TipoPagoInterface;
use App\Models\TipoPago;

class TipoPagosRepository extends BaseRepository implements TipoPagoInterface
{
    public function __construct(TipoPago $tipoPago)
    {
        parent::__construct($tipoPago);
    }

    public function getActivos()
    {
        return $this->model
            ->where('estado', true)
            ->get();
    }

    public function cambiarEstado(int $id, bool $estado)
    {
        return $this->update(
            ['estado' => $estado],
            $id
        );
    }

    public function buscarPorNombre(string $nombre)
    {
        return $this->model
            ->where('nombre', 'LIKE', "%{$nombre}%")
            ->get();
    }

    public function buscarPorEstado(bool $estado)
    {
        return $this->model
            ->where('estado', $estado)
            ->get();
    }

    public function obtenerPagos(int $tipo_pago_id)
    {
        // Nota: Asumo que tienes una relación 'pagos' definida en tu modelo TipoPago
        $registro = $this->getById($tipo_pago_id);
        
        return $registro ? $registro->pagos : collect();
    }
}
