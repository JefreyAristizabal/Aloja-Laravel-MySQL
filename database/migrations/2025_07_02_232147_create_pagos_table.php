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
        Schema::create('pagos', function (Blueprint $table) {
            $table->integer('idPagos', true)->unique('idpagos');
            $table->dateTime('Fecha_Pago')->nullable();
            $table->double('Valor')->nullable();
            $table->integer('Empleado_idEmpleado')->index('fk_pagos_empleado1_idx');
            $table->integer('Estadia_idEstadia')->index('fk_pagos_estadia1_idx');
            $table->integer('HUESPED_idHUESPED')->index('fk_pagos_huesped1_idx');
            $table->string('Imagen', 100)->nullable();
            $table->string('Observacion', 100)->nullable();

            $table->primary(['idPagos', 'HUESPED_idHUESPED']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
