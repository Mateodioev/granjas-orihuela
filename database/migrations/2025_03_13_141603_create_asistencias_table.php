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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados', 'id')->cascadeOnDelete();
            $table->date('fecha');
            $table->integer('horas_trabajadas')->default(8);
            $table->integer('tardanza')->nullable();
            $table->dateTime('entrada')->nullable();
            $table->dateTime('salida')->nullable();
            $table->enum('estado', ['PRESENTE', 'TARDE', 'FALTA', 'JUSTIFICADO']);
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
