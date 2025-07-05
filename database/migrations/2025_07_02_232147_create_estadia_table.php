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
        Schema::create('estadia', function (Blueprint $table) {
            $table->integer('idEstadia', true);
            $table->date('Fecha_Inicio')->nullable();
            $table->date('Fecha_Fin')->nullable();
            $table->dateTime('Fecha_Registro')->nullable()->useCurrent();
            $table->double('Costo')->nullable();
            $table->integer('Habitacion_idHabitacion')->index('fk_estadia_habitacion1_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadia');
    }
};
