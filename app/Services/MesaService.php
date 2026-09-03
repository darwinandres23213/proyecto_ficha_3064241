<?php

namespace App\Services;

use App\Interfaces\MesaInterface;

class MesaService
{
    protected $mesaRepository;

    // Inyectamos la Interfaz de la mesa
    public function __construct(MesaInterface $mesaRepository)
    {
        $this->mesaRepository = $mesaRepository;
    }

    // Obtener todas las mesas
    public function listarTodas()
    {
        return $this->mesaRepository->all();
    }

    // Buscar una mesa por su ID
    public function obtenerPorId(int $id)
    {
        return $this->mesaRepository->find($id);
    }

    // Crear una mesa con validaciones de negocio
    public function registrarMesa(array $datos)
    {
        if (isset($datos['capacidad']) && $datos['capacidad'] <= 0) {
            throw new \Exception("La capacidad de la mesa debe ser de al menos 1 persona.");
        }

        if (!isset($datos['estado'])) {
            $datos['estado'] = 'disponible';
        }

        return $this->mesaRepository->create($datos);
    }

    // Actualizar datos de la mesa
    public function modificarMesa(int $id, array $datos)
    {
        return $this->mesaRepository->update($id, $datos);
    }

    // Eliminar una mesa
    public function removerMesa(int $id)
    {
        return $this->mesaRepository->delete($id);
    }

    // --- MÉTODOS ESPECÍFICOS DE MESA ---

    // Obtener mesas por su estado
    public function listarPorEstado(string $estado)
    {
        return $this->mesaRepository->getByEstado($estado);
    }

    // Obtener mesas de una zona específica
    public function listarPorZona(int $zonaId)
    {
        return $this->mesaRepository->getByZona($zonaId);
    }
}
