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
        
        Schema::create('zonas', function (Blueprint $table) {
            $table->id(); // llave primaria
            $table->string("nombre", 80)->unique();
            $table->text("descripcion");
            $table->unsignedInteger("aforo_maximo");
            $table->decimal("precio_cover",10,2);
            $table->boolean("estado");
            $table->timestamps();

         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("zonas");
    }
};



