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
        Schema::Create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("codigo");
            $table->string("nombre", 120,);
            $table->text("descripcion")->nullable();
            $table->decimal("precio_venta",12,2);
            $table->decimal("precio_compra",12,2)->nullable();
            $table->string("unidad_medida",20);
            $table->boolean("estado",1);
            $table->timestamps();
            $table->unsignedBigInteger("id_categoria");
            $table->unsignedBigInteger("id_proveedor");

            $table->foreign("id_categoria")->references("id")->on("categorias_producto");
            $table->foreign("id_proveedor")->references("id")->on("proveedores");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("productos");
    }
};
