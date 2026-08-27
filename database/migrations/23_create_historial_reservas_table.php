<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historial_reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_id')->constrained('reservas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('empleado_id')->constrained('empleados')->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('accion', ['creada', 'editada', 'eliminada', 'recuperada']);
            $table->string('estado_anterior', 255)->nullable();
            $table->string('estado_nuevo', 255)->nullable();
            $table->string('observaciones', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_reservas');
    }
};
