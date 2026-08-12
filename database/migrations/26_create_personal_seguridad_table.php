<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personal_seguridad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->unique()->constrained('empleados')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('empresa_seguridad', 100)->nullable();
            $table->string('cargo', 50);
            $table->enum('turno', ['Dia', 'Noche', 'Rotativo']);
            $table->string('licencia', 50)->nullable()->unique();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_seguridad');
    }
};
