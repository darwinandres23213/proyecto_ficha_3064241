<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')
                ->constrained('ventas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('tipo_pago_id')
                ->constrained('tipos_pago')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->decimal('monto', 12, 2);
            $table->string('referencia', 80)->nullable();
            $table->dateTime('fecha_pago');
            $table->enum('estado', ['exitoso', 'pendiente', 'fallido']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
