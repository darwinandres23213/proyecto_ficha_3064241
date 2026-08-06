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
        Schema::create('Venta', function (Blueprint $table) {
            $table->id(); // PK -> BIGINT AUTO_INCREMENT

            $table->unsignedBigInteger("ClienteId")->nullable();   // FK -> Clientes.id (opcional)
            $table->unsignedBigInteger("EmpleadoId");               // FK -> Empleados.id (requerido)
            $table->unsignedBigInteger("MesaId")->nullable();       // FK -> Mesas.id (opcional)
            $table->unsignedBigInteger("PromocionId")->nullable();  // FK -> Promociones.id (opcional)

            $table->string("NumeroFactura", 30)->unique(); // Número de factura/recibo
            $table->dateTime("FechaVenta");                // Fecha y hora de la venta
            $table->decimal("Subtotal", 12, 2);            // Subtotal sin descuentos
            $table->decimal("Descuento", 12, 2);           // Valor descontado
            $table->decimal("Total", 12, 2);               // Total a pagar
            $table->enum("Estado", ["abierta", "pagada", "anulada"]); // Estado de la venta

            $table->timestamps(); // created_at y updated_at

            // Llaves foráneas
            $table->foreign("ClienteId")->references("id")->on("Cliente");
            $table->foreign("EmpleadoId")->references("id")->on("Empleado");
            $table->foreign("MesaId")->references("id")->on("Mesa");
            $table->foreign("PromocionId")->references("id")->on("Promocion");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Venta');
    }
};
