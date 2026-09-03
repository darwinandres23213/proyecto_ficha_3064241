<?php

namespace App\Services;

use App\Repositories\PagoInterface;

class PagoService
{
    public function __construct(
        private PagoInterface $pagoRepository
    ) {}

    public function all()
    {
        return $this->pagoRepository->getAll();
    }

    public function show(int $id)
    {
        return $this->pagoRepository->getById($id);
    }

    public function store(array $data)
    {
        return $this->pagoRepository->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->pagoRepository->update($data, $id);
    }

    public function destroy(int $id)
    {
        return $this->pagoRepository->delete($id);
    }
}
