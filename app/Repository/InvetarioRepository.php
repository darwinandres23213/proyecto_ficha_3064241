<?php

use App\Models\Inventario;
use App\Interfaces\InventarioInterface;

class InventarioRepository extends BaseRepository implements InventarioInterface
{
    public function __construct(Inventario $in)
    {
        parent::__construct($in);
    }

    public function getByProductoId(int $producto_id){
        return $this->model->where('producto_id', $producto_id)->get();
    }

    public function getStockByUbicacion(string $ubicacion){
     return $this->model->where('ubicacion', $ubicacion)->get();
    }

    public function getStockActual(int $stock_actual){
     return $this->model->where('stock_actual', $stock_actual)->get();
    }
}
