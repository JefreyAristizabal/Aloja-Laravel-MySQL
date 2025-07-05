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
        Schema::create('huesped_has_estadia', function (Blueprint $table) {
            $table->integer('HUESPED_idHUESPED')->index('fk_huesped_has_estadia_huesped1');
            $table->integer('Estadia_idEstadia')->index('fk_huesped_has_estadia_estadia1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huesped_has_estadia');
    }
};
