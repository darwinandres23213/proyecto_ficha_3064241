<?php

namespace App\Repository;

use App\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Model;

class HistorialReservaRepository extends BaseInterface implements HistorialReservaInterface 
{
   public function __construct(HistorialReserva $historial) 
   {
    parent::__construct($historial);
   }

    public function getByReservaId(int $reserva_id) 
    {

        return $this->model->where('reserva_id', $reserva_id)->get();

    }
    


}