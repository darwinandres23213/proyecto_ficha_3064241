<?php

namespace App\Repository;

class ReservaRepository extends BaseRepository implements ReservaRepositoryInterface
{
    public function __construct(Reserva $reserva)
    {
        parent::__construct($reserva);git 
    }

    public function getState(string $estado){
       return $this->model->where('estado', $estado)->get();
    }
    public function getByEvento(int $eventoId){
    return $this->model->where('evento_id', $eventoId)->get();
    }
    public function getByEmpleado(int $empleadoId){
    return $this->model->where('empleado_id', $empleadoId)->get();
    }

   public function getObtenerByDisponibilidad(DateTime $fecha, int $cantidadPersonas): array{
   return $this->model->where('fecha', $fecha)
                      ->where('cantidad_personas', '>=', $cantidadPersonas)
                      ->get()
                      ->toArray();
   }
   

}