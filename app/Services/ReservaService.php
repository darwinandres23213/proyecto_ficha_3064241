<?php

namespace App\Services;
use App\Interfaces\ReservaInterface;
use DateTime;

class ReservaService
{
    public function __construct(
        
    private ReservaInterface $reservaRepository
    )
    {}
    //funciones de la clase BaseRepository
    public function create(array $datos)
    {
        return $this->reservaRepository->create($datos);
    }
    public function getById(int $id)
    {
        return $this->reservaRepository->getById($id);
    }
    public function update ( array $datos,int $id)
    {
        return $this->reservaRepository->update($datos, $id);
    }
    public function delete(int $id)
    {
        return $this->reservaRepository->delete($id);
    }
    public function getAllReservas()
    {
        return $this->reservaRepository->getAll();
    }

     //metodos de la clase ReservaRepository
   
   public function getState(string $estado)
   {
       return $this->reservaRepository->getState($estado);
   }
   public function getByEvento(int $eventoId)
   {
       return $this->reservaRepository->getByEvento($eventoId);
   }
   public function getByEmpleado(int $empleadoId)
   {
       return $this->reservaRepository->getByEmpleado($empleadoId);
   }
   public function getObtenerByDisponibilidad(DateTime $fecha, int $cantidadPersonas): array
   {
       return $this->reservaRepository->getObtenerByDisponibilidad($fecha, $cantidadPersonas);
   }


}