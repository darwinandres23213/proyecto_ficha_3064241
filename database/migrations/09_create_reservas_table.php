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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('mesa_id')->nullable()->constrained('mesas')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('evento_id')->nullable()->constrained('eventos')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('empleado_id')->nullable()->constrained('empleados')->cascadeOnUpdate()->restrictOnDelete();
            $table->dateTime('fecha_reserva');
            $table->unsignedTinyInteger('cantidad_personas');
            $table->decimal('anticipo', 12, 2)->nullable();
            $table->text('observaciones')->nullable();
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada', 'asistio']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
