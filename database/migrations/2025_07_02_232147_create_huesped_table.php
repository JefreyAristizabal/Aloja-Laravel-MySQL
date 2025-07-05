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
        Schema::create('huesped', function (Blueprint $table) {
            $table->integer('idHUESPED', true);
            $table->string('Nombre_completo', 45)->nullable();
            $table->string('tipo_documento', 45)->nullable();
            $table->string('numero_documento', 20)->unique('numero_documento')->comment('Número de documento del huésped, puede ser un número de identificación o pasaporte');
            $table->string('Telefono_huesped', 45)->nullable();
            $table->string('Origen', 45)->nullable();
            $table->string('Nombre_Contacto', 45)->nullable();
            $table->string('Telefono_contacto', 45)->nullable();
            $table->string('Observaciones', 45)->nullable();
            $table->string('observaciones2', 45)->nullable();

            $table->unique(['numero_documento'], 'numero_documento_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huesped');
    }
};
