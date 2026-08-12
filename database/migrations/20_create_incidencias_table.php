<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('zona_id')->nullable()->constrained('zonas')->cascadeOnUpdate()->nullOnDelete();
            $table->string('titulo', 120);
            $table->text('descripcion');
            $table->enum('tipo', ['seguridad', 'mantenimiento', 'queja', 'otro']);
            $table->enum('gravedad', ['baja', 'media', 'alta']);
            $table->dateTime('fecha_reporte');
            $table->enum('estado', ['abierta', 'en_proceso', 'cerrada']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
