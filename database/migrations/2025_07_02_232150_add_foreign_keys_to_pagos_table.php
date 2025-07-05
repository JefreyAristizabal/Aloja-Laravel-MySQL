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
        Schema::table('pagos', function (Blueprint $table) {
            $table->foreign(['Empleado_idEmpleado'], 'fk_Pagos_Empleado1')->references(['idEmpleado'])->on('empleado')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['Estadia_idEstadia'], 'fk_Pagos_Estadia1')->references(['idEstadia'])->on('estadia')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['HUESPED_idHUESPED'], 'fk_Pagos_HUESPED1')->references(['idHUESPED'])->on('huesped')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropForeign('fk_Pagos_Empleado1');
            $table->dropForeign('fk_Pagos_Estadia1');
            $table->dropForeign('fk_Pagos_HUESPED1');
        });
    }
};
