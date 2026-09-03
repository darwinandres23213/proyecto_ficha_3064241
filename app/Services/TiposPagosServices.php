<?php

namespace App\Services;

use App\Interfaces\TipoPagoInterface;

class TipoPagoService
{
    protected TipoPagoInterface $tipoPagoRepository;

    // Inyectamos la interfaz del repositorio en el constructor
    public function __construct(TipoPagoInterface $tipoPagoRepository)
    {
        $this->tipoPagoRepository = $tipoPagoRepository;
    }

    public function obtenerTodos()
    {
        return $this->tipoPagoRepository->getAll();
    }

    public function obtenerActivos()
    {
        return $this->tipoPagoRepository->getActivos();
    }

    public function buscarPorId(int $id)
    {
        return $this->tipoPagoRepository->getById($id);
    }

    public function crear(array $datos)
    {
        // Puedes agregar lógica de negocio aquí antes de guardar
        if (!isset($datos['estado'])) {
            $datos['estado'] = true; // Estado activo por defecto
        }

        return $this->tipoPagoRepository->create($datos);
    }

    public function actualizar(array $datos, int $id)
    {
        return $this->tipoPagoRepository->update($datos, $id);
    }

    public function eliminar(int $id)
    {
        return $this->tipoPagoRepository->delete($id);
    }

    public function cambiarEstado(int $id, bool $estado)
    {
        return $this->tipoPagoRepository->cambiarEstado($id, $estado);
    }

    public function buscarPorNombre(string $nombre)
    {
        return $this->model
            ? $this->tipoPagoRepository->buscarPorNombre($nombre)
            : collect();
    }

    public function buscarPorEstado(bool $estado)
    {
        return $this->tipoPagoRepository->buscarPorEstado($estado);
    }

    public function obtenerPagosAsociados(int $tipo_pago_id)
    {
        return $this->tipoPagoRepository->obtenerPagos($tipo_pago_id);
    }
}
