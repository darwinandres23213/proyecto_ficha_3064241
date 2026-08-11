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
        Schema::create('membresias', function (Blueprint $table) {
            $table->id(); // PK -> BIGINT AUTO_INCREMENT

            $table->foreignId('id_cliente')
                  ->constrained('clientes') // FK -> clientes.id
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->string('tipo_membresia', 50);
            $table->integer('puntos_acumulados')->default(0);
            $table->date('fecha_inicio');
            $table->date('fecha_vencimiento')->nullable();
            $table->string('estado', 20)->default('Activa');
            $table->text('beneficios')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresias');
    }
};
