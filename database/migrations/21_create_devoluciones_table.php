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
            $table->foreignId('venta_id')->constrained('ventas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('empleado_id')->constrained('empleados')->cascadeOnUpdate()->restrictOnDelete();
            $table->text('motivo');
            $table->decimal('monto_devuelto', 12, 2);
            $table->enum('metodo_reembolso', ['efectivo', 'tarjeta', 'transferencia']);
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada']);
            $table->dateTime('fecha_devolucion');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devoluciones');
    }
};
