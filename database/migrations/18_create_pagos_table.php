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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('venta_id')
                ->constrained('ventas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->enum('metodo', [
                'efectivo',
                'tarjeta',
                'transferencia',
                'mixto'
            ]);

            $table->decimal('monto', 12, 2);

            $table->string('referencia', 80)->nullable();

            $table->dateTime('fecha_pago');

            $table->enum('estado', [
                'exitoso',
                'pendiente',
                'fallido'
            ]);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};

