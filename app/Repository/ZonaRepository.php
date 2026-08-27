<?php

namespace App\Repository;


use App\Interfaces\ZonaInterface;
use App\Models\Zona;

class ZonaRepository extends BaseRepository implements ZonaInterface

{
    public function __construct(Zona $Zona1)
    {
        parent::__construct($Zona1);
    }


    public function findByAforoMaximo($aforoMaximo)
    {
        return $this->model->where('aforo_maximo', $aforoMaximo)->get();
    }

    public function findByNombreZona($nombreZona)
    {
        return $this->model->where('nombre_zona', $nombreZona)->get();
    }

    public function findByPrecioCover($precioCover)
    {
        return $this->model->where('precio_cover', $precioCover)->get();
    }
}   
