<?php

namespace App\Repository;

use App\Interfaces\EmpleadoInterface;
use App\Models\Empleado;

class EmpleadoRepository extends BaseRepository implements EmpleadoInterface

{
    public function __construct(Empleado $empleado)
    {
        parent::__construct($empleado);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $datos)
    {
        return $this->model->create($datos);
    }

    public function update(array $datos, int $id)
    {
        $registro = $this->model->find($id);
        if (!$registro)
            return null;

        $registro->update($datos);
        return $registro;
    }

    public function delete(int $id)
    {
        $registro = $this->model->find($id);
        if (!$registro)
            return null;

        return $registro->delete();
    }

}