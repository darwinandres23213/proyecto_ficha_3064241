<?php

namespace App\Services;

use App\Interfaces\EventoInterface;

class EventoService
{
    protected EventoInterface $eventoRepository;

    public function __construct(EventoInterface $eventoRepository)
    {
        $this->eventoRepository = $eventoRepository;
    }

    public function getAll()
    {
        return $this->eventoRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->eventoRepository->getById($id);
    }

    public function create(array $datos)
    {
        return $this->eventoRepository->create($datos);
    }

    public function update(array $datos, int $id)
    {
        return $this->eventoRepository->update($datos, $id);
    }

    public function delete(int $id)
    {
        return $this->eventoRepository->delete($id);
    }
     public function buscarPorNombre(string $nombre)
    {
        return $this->eventoRepository->buscarPorNombre($nombre);
    }

    public function buscarPorAforo(int $aforo)
    {
        return $this->eventoRepository->buscarPorAforo($aforo);
    }
    
}
