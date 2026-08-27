<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('evento_id')->constrained('eventos')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('codigo', 40)->unique();
            $table->enum('tipo', ['general', 'vip', 'cortesia']);
            $table->decimal('precio', 10, 2);
            $table->dateTime('fecha_compra');
            $table->dateTime('fecha_uso')->nullable();
            $table->enum('estado', ['comprada', 'usada', 'anulada']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
