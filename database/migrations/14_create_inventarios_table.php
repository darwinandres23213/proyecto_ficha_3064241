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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id(); //Identificador único del registro
            
            $table->unsignedInteger("stock_actual"); //Cantidad disponible
            $table->unsignedInteger("stock_minimo"); //Umbral de alerta
            $table->string("ubicacion", 80); //	Bodega, barra principal, VIP 
            $table->dateTime("ultima_entrada"); //Última reposición
            $table->dateTime("ultima_salida"); //Última salida por venta
            $table->timestamps(); //	Fecha de creación

            $table->foreignId("producto_id")->refereces("id")->on("productos"); // 	Producto controlado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("inventarios");
    }
};


