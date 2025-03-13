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
        Schema::create('horas_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados', 'id')->cascadeOnDelete();
            $table->foreignId('contrato_id')->constrained('contratos', 'id')->cascadeOnDelete();
            $table->date('fecha');
            $table->time('inicio')->nullable(false);
            $table->time('fin')->nullable(false);
            $table->boolean('aprobado')->default(false);
            $table->timestamps();
        });

        DB::statement('
            ALTER TABLE horas_extras
            ADD COLUMN total_minutos INT GENERATED ALWAYS AS (TIME_TO_SEC(TIMEDIFF(fin, inicio)) / 60) STORED,
            ADD COLUMN total_horas INT GENERATED ALWAYS AS (TIME_TO_SEC(TIMEDIFF(fin, inicio)) / 3600) STORED;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horas_extras');
    }
};
