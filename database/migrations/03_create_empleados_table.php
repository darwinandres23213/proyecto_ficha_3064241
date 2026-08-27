<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->unique()->constrained('usuarios')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('documento', 20)->unique();
            $table->string('nombres', 80);
            $table->string('apellidos', 80);
            $table->string('cargo', 60);
            $table->date('fecha_ingreso');
            $table->decimal('salario', 12, 2)->nullable();
            $table->enum('estado', ['activo', 'inactivo', 'vacaciones']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
