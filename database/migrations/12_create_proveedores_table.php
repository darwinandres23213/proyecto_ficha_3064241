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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY

            $table->string('nit', 20)->unique();
            $table->string('razon_social', 150);
            $table->string('contacto', 100)->nullable();
            $table->string('telefono', 20);
            $table->string('email', 150)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->boolean('estado')->default(true);

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};