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
        Schema::create('entradas', function (Blueprint $table) {
            // PK
            $table->id();

            // FKs (Dependencias)
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('evento_id')->constrained('eventos');

            // Campos de la tabla
            $table->string('codigo', 40)->unique();
            $table->enum('tipo', ['general', 'vip', 'cortesia']);
            $table->decimal('precio', 10, 2);
            $table->dateTime('fecha_compra');
            $table->dateTime('fecha_uso')->nullable();
            $table->enum('estado', ['comprada', 'usada', 'anulada']);

            // Timestamps (created_at, updated_at)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
