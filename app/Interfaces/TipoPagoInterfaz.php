<?php

namespace App\Interfaces;

interface TipoPagoInterface extends BaseInterface
{
    public function getActivos();

    public function cambiarEstado(int $id, bool $estado);
    public function buscarPorNombre(string $nombre);

    public function buscarPorEstado(bool $estado);

    public function obtenerPagos(int $tipo_pago_id);
}