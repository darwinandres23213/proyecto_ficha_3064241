<?php
namespace App\Services;

use App\Interfaces\EmpleadoInterface;
use App\Models\Empleado;
use App\Repositories\EmpleadoRepository;

class EmpleadoService
{
    protected $empleadoRepository;

    public function __construct(EmpleadoRepository $empleadoRepository)
    {
        $this->empleadoRepository = $empleadoRepository;
    }

    public function getAll()

    {
        return $this->empleadoRepository->getAll();
    }

    public function getById($id)
    {
        return $this->empleadoRepository->getById($id);
    }

    public function create($data)
    {
        return $this->empleadoRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->empleadoRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->empleadoRepository->delete($id);
    }
}


