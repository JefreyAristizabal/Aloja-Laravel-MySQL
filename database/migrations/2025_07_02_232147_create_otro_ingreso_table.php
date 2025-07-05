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
        Schema::create('otro_ingreso', function (Blueprint $table) {
            $table->integer('idOtro_Ingreso', true);
            $table->dateTime('Fecha_Registro')->nullable()->useCurrent();
            $table->integer('Empleado_idEmpleado')->nullable();
            $table->integer('Empleado_idEmpleado1')->index('fk_otro_ingreso_empleado1_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otro_ingreso');
    }
};
