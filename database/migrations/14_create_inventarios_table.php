<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos');
            $table->unsignedInteger('stock_actual');
            $table->unsignedInteger('stock_minimo');
            $table->string('ubicacion', 80)->nullable();
            $table->dateTime('ultima_entrada')->nullable();
            $table->dateTime('ultima_salida')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
