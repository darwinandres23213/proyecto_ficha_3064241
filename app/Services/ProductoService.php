<?php

namespace App\Services;

use App\Interfaces\ProductoInterface;

class ProductoService
{
    protected $productoRepository;

    public function __construct(ProductoInterface $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function listarProductos()
    {
        return $this->productoRepository->getAllProducts();
    }

    public function crearProducto(array $data)
    {
        return $this->productoRepository->createProduct($data);
    }

    public function actualizarProducto($id, array $data)
    {
        return $this->productoRepository->updateProduct($id, $data);
    }

    public function eliminarProducto($id)
    {
        return $this->productoRepository->deleteProduct($id);
    }
}