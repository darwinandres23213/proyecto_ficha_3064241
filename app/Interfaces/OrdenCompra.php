<?php

namespace App\Interfaces;

interface OrdenCompra extends BaseInterface
{
  public function findByNumeroOrden(string $numeroOrden);
  public function findByEstado(string $estado);
  public function findByFecha(datatime $fecha);

}