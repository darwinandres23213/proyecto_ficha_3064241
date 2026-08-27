<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('listas_negras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('empleado_id')->constrained('empleados')->cascadeOnUpdate()->restrictOnDelete();
            $table->text('motivo');
            $table->dateTime('fecha_registro');
            $table->dateTime('fecha_fin')->nullable();
            $table->enum('estado', ['activa', 'levantada']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listas_negras');
    }
};
