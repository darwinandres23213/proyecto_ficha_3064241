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
        Schema::create('promociones_table', function (Blueprint $table) {
            $table->id();
            $table->string("nombre",120)->nullable();
            $table->text("descripcion")->nullable();
            $table->enum("tipo_descuento", ['porcentaje','valor_fijo','2x1']);
            $table->decimal('valor_descuento', 12, 2);
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->boolean('estado')->default(true);
            $table->timestamps();
            $table->foreignId('evento_id')->nullable()->constrained('eventos')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promociones');
    }
};
