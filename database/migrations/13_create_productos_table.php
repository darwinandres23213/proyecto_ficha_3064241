<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Identificador único autoincremental
            $table->string('nombre'); // Nombre del producto (ej. Cerveza, Whisky, etc.)
            $table->text('descripcion')->nullable(); // Descripción opcional del producto
            $table->decimal('precio', 8, 2); // Precio con hasta 8 dígitos en total y 2 decimales
            $table->integer('stock'); // Cantidad disponible en inventario
            
            // Llaves foráneas para las relaciones del sistema
            $table->unsignedBigInteger('categoria_id'); // Relación con la tabla categorías
            $table->unsignedBigInteger('proveedor_id'); // Relación con la tabla proveedores

            $table->timestamps(); // Campos created_at y updated_at automáticos

            // Definición de las restricciones (Foreign Keys) para asegurar la integridad de los datos
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categorias_producto')
                  ->onDelete('cascade');

            $table->foreign('proveedor_id')
                  ->references('id')
                  ->on('proveedores')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
