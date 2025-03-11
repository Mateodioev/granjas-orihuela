<?php

use App\Enums\MonedaEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cuenta_bancarias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados', 'id')->cascadeOnDelete();
            $table->foreignId('banco_id')->constrained('bancos', 'id')->cascadeOnDelete();
            $table->string('numero_cuenta')->unique();
            $table->string('cuenta_cts')->unique()->nullable();
            $table->string('moneda')->nullable(false)->default(MonedaEnum::SOLES->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuenta_bancarias');
    }
};
