<?php

namespace App\Repository;

use App\Interfaces\ProveedorInterface;
use App\Models\Proveedor;

class ProveedorRepository extends BaseRepository implements ProveedorInterface
{
    public function __construct(Proveedor $model)
    {
        parent::__construct($model);
    }

    public function searchByName(string $name): array
    {
        return $this->model
            ->where('razon_social', 'LIKE', "%{$name}%")
            ->get()
            ->toArray();
    }

    public function getByEmail(string $email): ?object
    {
        return $this->model
            ->where('email', $email)
            ->first();
    }

    public function getActiveProviders(): array
    {
        return $this->model
            ->where('estado', true)
            ->get()
            ->toArray();
    }
}
