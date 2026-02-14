<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hardware_specs', function (Blueprint $table) {
            // Agregamos la columna faltante
            $table->decimal('price_estimate', 10, 2)->nullable()->after('score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hardware_specs', function (Blueprint $table) {
            $table->dropColumn('price_estimate');
        });
    }
};
