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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->string("nombre",120);
            $table->text("descripcion");
            $table->dateTime("fecha_inicio");
            $table->dateTime("fecha_fin");
            $table->unsignedInteger("aforo");
            $table->decimal("precio_entrada",10,2);
            $table->enum("estado",["programado","en_curso","finalizado","cancelado"]);
            $table->timestamps();

            $table->unsignedBigInteger("zonas_id"); // fk
            $table->unsignedBigInteger("dj_artistas_id"); // fk

            $table->foreign("zonas_id")->references("id")->on("zonas");
            $table->foreign("dj_artistas_id")->references("id")->on("djs_artistas");
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("eventos");
        }
};
