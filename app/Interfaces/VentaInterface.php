<?php

namespace App\Interfaces;

interface VentaInterface
{
    public function getAll(); // Traer todas las ventas
    public function getById(int $id); // Obtener venta por id
    public function getByEstado(string $estado); // Filtrar ventas por estado: abierta | pagada | anulada
}

//hola . 


