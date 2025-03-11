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
        Schema::create('remuneraciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados', 'id')->cascadeOnDelete();
            $table->foreignId('contrato_id')->constrained('contratos', 'id')->cascadeOnDelete();
            $table->date('fecha_pago')->nullable();
            $table->decimal('salario_bruto', 10, 2)->nullable(false);
            $table->decimal('bonus', 10, 2)->default(0);
            $table->decimal('deducciones', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remuneraciones');
    }
};
