<?php

namespace App\Interfaces;

interface ProveedorInterface extends BaseInterface
{
    public function searchByName(string $name): array;

    public function getByEmail(string $email): ?object;

    public function getActiveProviders(): array;
}