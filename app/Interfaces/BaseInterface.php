<?php

namespace App\Interfaces;

interface BaseInterface
{
    public function getAll(); //Traer todos los registros
    public function getById(int $id); // Obtener por id
    public function create(array $datos);
    public function update(array $datos, int $id);
    public function delete(int $id);
} 