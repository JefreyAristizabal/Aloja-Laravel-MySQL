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
        Schema::create('tarifa', function (Blueprint $table) {
            $table->integer('idTarifa', true);
            $table->string('Modalidad', 45)->nullable();
            $table->integer('NroHuespedes')->nullable();
            $table->double('Valor')->nullable();
            $table->integer('Habitacion_idHabitacion')->index('fk_tarifa_habitacion1_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifa');
    }
};
