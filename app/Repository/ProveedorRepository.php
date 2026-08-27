<?php

namespace App\Repositories;

use App\Interfaces\ProveedorInterface;
use App\Models\Proveedor;

class ProveedorRepository extends ProveedorInterface
{
    public function getAll()
    {
        return Proveedor::all();
    }

    public function getById(int $id)
    {
        return Proveedor::find($id);
    }

    public function create(array $datos)
    {
        return Proveedor::create($datos);
    }

    public function update(array $datos, int $id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return null;
        }

        $proveedor->update($datos);

        return $proveedor;
    }

    public function delete(int $id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return false;
        }

        return $proveedor->delete();
    }

    public function searchByName(string $name): array
    {
        return Proveedor::where('razon_social', 'LIKE', "%{$name}%")
            ->get()
            ->toArray();
    }

    public function getByEmail(string $email): ?object
    {
        return Proveedor::where('email', $email)->first();
    }

    public function getActiveProviders(): array
    {
        return Proveedor::where('estado', true)
            ->get()
            ->toArray();
    }
}

