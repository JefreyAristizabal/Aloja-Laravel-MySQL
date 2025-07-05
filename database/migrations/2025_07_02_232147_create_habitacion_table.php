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
        Schema::create('habitacion', function (Blueprint $table) {
            $table->integer('idHABITACION', true);
            $table->unsignedInteger('CAPACIDAD')->nullable();
            $table->string('DESCRIPCION')->nullable();
            $table->string('NOMBRE', 45)->nullable();
            $table->double('COSTONOCHE')->nullable();
            $table->string('IMAGEN')->nullable();
            $table->enum('ESTADO', ['OCUPADO', 'EN MANTENIMIENTO', 'DISPONIBLE'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacion');
    }
};
