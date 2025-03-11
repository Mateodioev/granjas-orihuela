<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adelantos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados', 'id')->cascadeOnDelete();
            $table->foreignId('remuneracion_id')->constrained('remuneraciones', 'id')->cascadeOnDelete();
            $table->date('fecha')->nullable(false);
            $table->decimal('monto', 10, 2)->nullable(false);
            $table->string('estado')->nullable(false);
            $table->text('detalles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adelantos');
    }
};
