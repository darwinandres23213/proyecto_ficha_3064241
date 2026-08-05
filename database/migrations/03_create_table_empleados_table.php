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
        Schema::create('empleados', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->string('documento', 20)->unique();
            $table->string('nombres', 80);
            $table->string('apellidos', 80);
            $table->string('cargo', 60);
            $table->date('fecha_ingreso');
            $table->decimal('salario', 12, 2)->nullable();
            $table->enum('estado', ['activo', 'inactivo', 'vacaciones']);
            $table->timestamps();

            $table->foreign('usuario_id')
                  ->references('id') //
                  ->on('usuarios')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};