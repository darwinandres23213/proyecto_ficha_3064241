<?php

namespace App\Services;
use App\Interfaces\CategoriaProductoInterface;


class CategoriaProductoService

{
    public function __construct(
        private CategoriaProductoInterface $CategoriaProductoRepository
    ){}

    public function create(array $datos)
    {
        // Puedes agregar lógica de negocio aquí antes de guardar
        if (!isset($datos['estado'])) {
            $datos['estado'] = true; // Estado activo por defecto
        }

        return $this->CategoriaProductoRepository->create($datos);
    }

    public function getAll()
    {
        return $this->CategoriaProductoRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->CategoriaProductoRepository->getById($id);
    }

    public function update(array $datos, int $id)
    {
        return $this->CategoriaProductoRepository->update($datos, $id);
    }

    public function delete(int $id)
    {
        return $this->CategoriaProductoRepository->delete($id);
    }

    public function categoríaActivada (int $idCategoria)
    {
        return $this->CategoriaProductoRepository->categoríaActivada($idCategoria);
    }

    public function productoAsignadoCategoría (int $idCategoria, $idProducto)
    {
        return $this->CategoriaProductoRepository->productoAsignadoCategoría($idCategoria, $idProducto);
    }

    public function categoríaDesactivada (int $idCategoria)
    {
        return $this->CategoriaProductoRepository->categoríaDesactivada($idCategoria);

    }



    



    
}