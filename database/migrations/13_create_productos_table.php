<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 30)->unique();
            $table->string('nombre', 120);
            $table->text('descripcion')->nullable();
            $table->decimal('precio_venta', 12, 2);
            $table->decimal('precio_compra', 12, 2)->nullable();
            $table->string('unidad_medida', 20);
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_proveedor');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categorias_producto');
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
