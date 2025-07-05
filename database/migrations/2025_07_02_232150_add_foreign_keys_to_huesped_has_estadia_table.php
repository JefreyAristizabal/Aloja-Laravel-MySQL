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
        Schema::table('huesped_has_estadia', function (Blueprint $table) {
            $table->foreign(['Estadia_idEstadia'], 'fk_HUESPED_has_Estadia_Estadia1')->references(['idEstadia'])->on('estadia')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['HUESPED_idHUESPED'], 'fk_HUESPED_has_Estadia_HUESPED1')->references(['idHUESPED'])->on('huesped')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('huesped_has_estadia', function (Blueprint $table) {
            $table->dropForeign('fk_HUESPED_has_Estadia_Estadia1');
            $table->dropForeign('fk_HUESPED_has_Estadia_HUESPED1');
        });
    }
};
