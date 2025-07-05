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
        Schema::create('empleado', function (Blueprint $table) {
            $table->integer('idEmpleado', true);
            $table->string('Nombre_Completo', 45)->nullable();
            $table->string('Usuario', 45)->nullable();
            $table->string('Password', 45)->nullable();
            $table->enum('Rol', ['EMPLEADO', 'ADMIN'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};
