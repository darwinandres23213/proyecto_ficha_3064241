<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('djs_artistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_artistico', 100)->unique();
            $table->string('nombre_real', 120)->nullable();
            $table->string('genero_musical', 60);
            $table->text('biografia')->nullable();
            $table->string('contacto', 100)->nullable();
            $table->decimal('cache_base', 12, 2)->nullable();
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('djs_artistas');
    }
};
