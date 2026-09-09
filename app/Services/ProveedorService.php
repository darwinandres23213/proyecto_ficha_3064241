<?php

namespace App\Services;

use App\Repository\ProveedorRepository;

class ProveedorService
{
    protected ProveedorRepository $proveedorRepository;

    public function __construct(ProveedorRepository $proveedorRepository)
    {
        $this->proveedorRepository = $proveedorRepository;
    }

    public function getAll()
    {
        return $this->proveedorRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->proveedorRepository->getById($id);
    }

    public function create(array $datos)
    {
        return $this->proveedorRepository->create($datos);
    }

    public function update(array $datos, int $id)
    {
        return $this->proveedorRepository->update($datos, $id);
    }

    public function delete(int $id)
    {
        return $this->proveedorRepository->delete($id);
    }

    public function searchByName(string $name)
    {
        return $this->proveedorRepository->searchByName($name);
    }

    public function getByEmail(string $email)
    {
        return $this->proveedorRepository->getByEmail($email);
    }

    public function getActiveProviders()
    {
        return $this->proveedorRepository->getActiveProviders();
    }
}