<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('historial_reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("reserva_id")->index();
            $table->unsignedBigInteger("empleado_id");
            $table->enum('accion', ['creada', 'editada', 'eliminada', 'recuperada']);
            $table->string("estado_anterior", 255)->nullable();
            $table->string("estado_nuevo", 255)->nullable();
            $table->string("observaciones", 255)->nullable();
            $table->timestamps();

            $table->foreign("reserva_id")->references("id")->on("reservas");
            $table->foreign("empleado_id")->references("id")->on("empleados");

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_reservas');
    }
};



