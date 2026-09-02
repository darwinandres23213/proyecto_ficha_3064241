<?php

namespace App\Repository;

use App\Interfaces\BaseInterface;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;
class BaseRepository implements BaseInterface
{
    /**
     * @var Model|\Illuminate\Database\Eloquent\Builder
     */
   protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $datos)
    {
        return $this->model->create($datos);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        $registro = $this->model->find($id);

        if(!$registro)
        {
            return null;
        }

        return $registro;
    }

    public function update(array $datos, int $id)
    {

        $registro = $this->model->find($id);

        if(!$registro)
        {
            return null;
        }               
        
        $registro->update($datos);

       return $registro->fresh();
    }

    public function delete(int $id)
    {
        $registro = $this->model->find($id);

        if(!$registro)
        {
            return null;
        }               
        
        return $registro->delete();
    }


}