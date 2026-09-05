<?php

namespace App\Repository;

use App\Interfaces\ProductoInterface;
use App\Models\Producto;

class ProductoRepository implements ProductoInterface
{
    public function getAllProducts()
    {
        return Producto::with(['categoria', 'proveedor'])->get();
    }

    public function getProductById($id)
    {
        return Producto::findOrFail($id);
    }

    public function createProduct(array $data)
    {
        return Producto::create($data);
    }

    public function updateProduct($id, array $data)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($data);
        return $producto;
    }

    public function deleteProduct($id)
    {
        $producto = Producto::findOrFail($id);
        return $producto->delete();
    }
}