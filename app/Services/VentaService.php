<?php

namespace App\Services;

use App\Interfaces\VentaInterface;

// Capa de servicio: contiene la lógica de negocio y usa el repositorio para acceder a los datos
class VentaService
{
    // Inyecta la interfaz del repositorio para desacoplar la lógica de la implementación
    public function __construct(protected VentaInterface $ventaRepository) {}

    // Retorna todas las ventas registradas
    public function getAll()
    {
        return $this->ventaRepository->getAll();
    }

    // Retorna una venta por su ID
    public function getById(int $id)
    {
        return $this->ventaRepository->getById($id);
    }

    // Crea una nueva venta con los datos recibidos
    public function create(array $datos)
    {
        return $this->ventaRepository->create($datos);
    }

    // Actualiza los datos de una venta existente
    public function update(array $datos, int $id)
    {
        return $this->ventaRepository->update($datos, $id);
    }

    // Elimina una venta por su ID
    public function delete(int $id)
    {
        return $this->ventaRepository->delete($id);
    }

    // Busca una venta usando su número de factura único
    public function getByNumeroFactura(string $numeroFactura)
    {
        return $this->ventaRepository->getByNumeroFactura($numeroFactura);
    }

    // Retorna las ventas realizadas dentro de un rango de fechas
    public function getByRangoFechas(string $fechaInicio, string $fechaFin)
    {
        return $this->ventaRepository->getByRangoFechas($fechaInicio, $fechaFin);
    }

    // Retorna la suma del campo total de las ventas en un período determinado
    public function getTotalFacturadoEnPeriodo(string $fechaInicio, string $fechaFin): float
    {
        return $this->ventaRepository->getTotalFacturadoEnPeriodo($fechaInicio, $fechaFin);
    }

    // Cambia el estado de una venta (abierta, pagada o anulada)
    public function cambiarEstado(int $id, string $estado)
    {
        return $this->ventaRepository->cambiarEstado($id, $estado);
    }

    // Calcula el total de la venta aplicando el descuento al subtotal
    public function calcularTotal(int $id)
    {
        return $this->ventaRepository->calcularTotal($id);
    }

    // Marca una venta como anulada
    public function anular(int $id)
    {
        return $this->ventaRepository->anular($id);
    }
}


