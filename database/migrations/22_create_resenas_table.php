<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resenas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('evento_id')->constrained('eventos')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedTinyInteger('calificacion');
            $table->text('comentario')->nullable();
            $table->text('respuesta_admin')->nullable();
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])->default('pendiente');
            $table->timestamps();
            $table->unique(['cliente_id', 'evento_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resenas');
    }
};
