<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('devoluciones', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('empleado_id');
            $table->text('motivo');
            $table->decimal('monto_devuelto', 12, 2);
            $table->enum('metodo_reembolso', [
                'efectivo',
                'tarjeta',
                'transferencia'
            ]);
            $table->enum('estado', [
                'pendiente',
                'aprobada',
                'rechazada'
            ]);
            $table->dateTime('fecha_devolucion');
            $table->timestamps();

            $table->foreign('venta_id')
                  ->references('id')
                  ->on('ventas')
                  ->onDelete('cascade');

            $table->foreign('empleado_id')
                  ->references('id')
                  ->on('empleados')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devoluciones');
    }
};