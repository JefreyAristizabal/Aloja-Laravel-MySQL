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
        Schema::table('novedades', function (Blueprint $table) {
            $table->foreign(['Estadia_idEstadia'], 'fk_Novedades_Estadia1')->references(['idEstadia'])->on('estadia')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('novedades', function (Blueprint $table) {
            $table->dropForeign('fk_Novedades_Estadia1');
        });
    }
};
