<?php

namespace App\Interfaces;

interface CategoriaProductoInterface extends BaseInterface
{
    public function categoríaActivada (int $idCategoria);

    public function productoAsignadoCategoría (int $idCategoria, int $idProducto);
    
    public function categoríaDesactivada (int $idCategoria);

} 