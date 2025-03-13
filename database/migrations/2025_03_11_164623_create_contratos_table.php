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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados', 'id')->onDelete('cascade');
            $table->foreignId('sede_id')->constrained('sedes', 'id');
            $table->foreignId('puesto_id')->constrained('puestos', 'id');
            $table->decimal('rmv', 10, 2)->nullable(false);
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable()->default(null);
            $table->decimal('salario_bruto', 10, 2);
            $table->integer('horas_trabajo')->default(8);
            $table->string('status')->default('Vigente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
