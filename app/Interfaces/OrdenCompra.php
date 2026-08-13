<?php

namespace App\Interfaces;

interface OrdenCompra extends BaseInterface
{
  public function findbyNumeroOrden(string $numeroOrden);
  public function findbyEstado(string $estado);

  public function findByFecha(datatime $fecha);

}