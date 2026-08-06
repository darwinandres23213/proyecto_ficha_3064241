<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('objetos_perdidos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mesa_id')
                  ->constrained('mesas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->string('nombre_objeto', 100);
            $table->text('descripcion')->nullable();
            $table->string('lugar_encontrado', 100);
            $table->dateTime('fecha_encontrado');
            $table->enum('estado', ['disponible', 'entregado', 'desechado']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('objetos_perdidos');
    }
};