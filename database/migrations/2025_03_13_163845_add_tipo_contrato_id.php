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
        Schema::table('contratos', function (Blueprint $table) {
            $table->foreignId('tipo_contrato_id')->constrained('tipo_contratos', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contrato', function (Blueprint $table) {
            $table->dropForeign(['tipo_contrato_id']);
            $table->dropColumn('tipo_contrato_id');
        });
    }
};
