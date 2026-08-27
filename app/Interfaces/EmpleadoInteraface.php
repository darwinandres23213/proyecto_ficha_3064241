<?php 

namespace App\Interfaces;

use Carbon\CarbonInterface;

interface EmpleadoInterface extends BaseInterface 
{ 
    public function findByFechaIngreso(CarbonInterface $fecha_ingreso); 
    
    public function findByEstado(string $estado); 
    
    public function findByCargo(string $cargo); 
}
