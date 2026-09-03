<?php

namespace App\Repository;
use App\Interfaces\CategoriaProductoInterface;
use App\Models\CategoriaProducto;

class CategoriaProductoRepository extends BaseRepository implements CategoriaProductoInterface
{
    public function __contruct(CategoriaProducto $CategoriaProducto)
    {
        parent::__contrucct($CategoriaProducto);
    }

    public function categoríaActivada (int $idCategoria)
    {
        return $this->model->where('idCategoria', $idCategoria)->get();
    }

    public function productoAsignadoCategoría (int $idCategoria ,int $idProducto)
    {
        return $this->model->where('idCategoria', $idCategoria) 
        ->where('idProducto', $idProducto)->get();

    }

    public function categoríaDesactivada (int $idCategoria)
    {
        return $this->model->where('idCategoria', $idCategoria)->get();
    }
}