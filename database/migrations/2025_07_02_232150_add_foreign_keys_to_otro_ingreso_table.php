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
        Schema::table('otro_ingreso', function (Blueprint $table) {
            $table->foreign(['Empleado_idEmpleado1'], 'fk_Otro_Ingreso_Empleado1')->references(['idEmpleado'])->on('empleado')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('otro_ingreso', function (Blueprint $table) {
            $table->dropForeign('fk_Otro_Ingreso_Empleado1');
        });
    }
};
