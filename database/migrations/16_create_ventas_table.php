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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id(); // PK -> BIGINT AUTO_INCREMENT

            $table->unsignedBigInteger("cliente_id")->nullable();   // FK -> clientes.id (opcional)
            $table->unsignedBigInteger("empleado_id");               // FK -> empleados.id (requerido)
            $table->unsignedBigInteger("mesa_id")->nullable();       // FK -> mesas.id (opcional)
            $table->unsignedBigInteger("promocion_id")->nullable();  // FK -> promociones.id (opcional)

            $table->string("numero_factura", 30)->unique(); // Número de factura/recibo
            $table->dateTime("fecha_venta");                // Fecha y hora de la venta
            $table->decimal("subtotal", 12, 2);             // Subtotal sin descuentos
            $table->decimal("descuento", 12, 2);            // Valor descontado
            $table->decimal("total", 12, 2);                // Total a pagar
            $table->enum("estado", ["abierta", "pagada", "anulada"]); // Estado de la venta

            $table->timestamps(); // created_at y updated_at (nullable por defecto)

            // Llaves foráneas
            $table->foreign("cliente_id")->references("id")->on("clientes");
            $table->foreign("empleado_id")->references("id")->on("empleados");
            $table->foreign("mesa_id")->references("id")->on("mesas");
            $table->foreign("promocion_id")->references("id")->on("promociones");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
