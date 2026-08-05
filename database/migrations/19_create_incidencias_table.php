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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('zona_id')->nullable();
            $table->string('titulo', 120);
            $table->text('descripcion');
            $table->enum('tipo', ['seguridad', 'mantenimiento', 'queja', 'otro']);
            $table->enum('gravedad', ['baja', 'media', 'alta']);
            $table->dateTime('fecha_reporte');
            $table->enum('estado', ['abierta', 'en_proceso', 'cerrada']);
            $table->timestamp('created_attimestamp')->nullable();
            $table->timestamp('updated_attimestamp')->nullable();

            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('zona_id')->references('id')->on('zonas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};


