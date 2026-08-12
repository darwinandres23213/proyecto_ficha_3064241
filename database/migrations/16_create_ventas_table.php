<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('empleado_id')->constrained('empleados')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('mesa_id')->nullable()->constrained('mesas')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('promocion_id')->nullable()->constrained('promociones')->cascadeOnUpdate()->nullOnDelete();
            $table->string('numero_factura', 30)->unique();
            $table->dateTime('fecha_venta');
            $table->decimal('subtotal', 12, 2);
            $table->decimal('descuento', 12, 2);
            $table->decimal('total', 12, 2);
            $table->enum('estado', ['abierta', 'pagada', 'anulada']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
