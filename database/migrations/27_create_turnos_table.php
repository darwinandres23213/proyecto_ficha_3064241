<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('turnos_empleados', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('empleado_id');
            $table->date('fecha');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->enum('tipo_turno', ['mañana', 'tarde', 'noche']);
            $table->enum('estado', [
                'programado',
                'en_curso',
                'finalizado',
                'cancelado'
            ])->default('programado');

            $table->text('observaciones')->nullable();

            $table->timestamps();

            $table->foreign('empleado_id')
                  ->references('id')
                  ->on('empleados')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turnos_empleados');
    }
};