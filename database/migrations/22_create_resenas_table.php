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
        Schema::create('resenas', function (Blueprint $table) {
            $table->id(); // Identificador único de la reseña

            $table->foreignId('cliente_id')
                ->constrained('clientes')
                ->restrictOnDelete(); // Cliente que deja la reseña

            $table->foreignId('evento_id')
                ->constrained('eventos')
                ->restrictOnDelete(); // Evento reseñado

            $table->unsignedTinyInteger('calificacion'); // 1 a 5 estrellas
            $table->text('comentario')->nullable(); // Comentario del cliente
            $table->text('respuesta_admin')->nullable(); // Respuesta opcional del staff
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])
                ->default('pendiente'); // Moderación de la reseña

            $table->timestamps();

            // Un cliente solo puede reseñar un mismo evento una vez
            $table->unique(['cliente_id', 'evento_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resenas');
    }
};
