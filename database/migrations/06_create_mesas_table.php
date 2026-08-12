<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zona_id')->constrained('zonas')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('numero', 10)->unique();
            $table->unsignedTinyInteger('capacidad');
            $table->enum('tipo', ['estandar', 'vip', 'botellero']);
            $table->enum('estado', ['libre', 'ocupada', 'reservada', 'mantenimiento']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
