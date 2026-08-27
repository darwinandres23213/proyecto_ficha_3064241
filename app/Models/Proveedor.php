<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'nit',
        'razon_social',
        'contacto',
        'telefono',
        'email',
        'direccion',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'proveedor_id');
    }

    public function ordenesCompra()
    {
        return $this->hasMany(OrdenCompra::class, 'proveedor_id');
    }
}
