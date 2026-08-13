<?php

namespace App\Interfaces;

interface ProveedorInterface extends BaseInterface
{
    public function searchByName($name);

    public function getByEmail($email);

    public function getActiveProviders();
}