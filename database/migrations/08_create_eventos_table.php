<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zona_id')->constrained('zonas')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('dj_artista_id')->constrained('djs_artistas')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('nombre', 120);
            $table->text('descripcion');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->unsignedInteger('aforo');
            $table->decimal('precio_entrada', 10, 2);
            $table->enum('estado', ['programado', 'en_curso', 'finalizado', 'cancelado']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
