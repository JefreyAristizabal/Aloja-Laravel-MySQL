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
        Schema::table('tarifa', function (Blueprint $table) {
            $table->foreign(['Habitacion_idHabitacion'], 'fk_Tarifa_Habitacion1')->references(['idHABITACION'])->on('habitacion')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tarifa', function (Blueprint $table) {
            $table->dropForeign('fk_Tarifa_Habitacion1');
        });
    }
};
