<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')->constrained('ventas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('producto_id')->constrained('productos')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedInteger('cantidad');
            $table->decimal('precio_unitario', 12, 2);
            $table->decimal('subtotal', 12, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
