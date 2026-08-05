<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("nombres",50);
            $table->string("apellidos", 50);
            $table->integer("edad");
            $table->enum("genero",["masculino", "femenino", "otro"]);
            $table->string("email")->unique();
            $table->string("password",200);
            $table->timestamps();
            $table->unsignedBigInteger("id_rol"); 

            $table->foreign("id_rol")->references("id")->on("roles");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("usuarios");
    }
};
