<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertHuesped`(
  IN p_NombreCompleto VARCHAR(45),
  IN p_TipoDocumento VARCHAR(45),
  IN p_NumeroDocumento VARCHAR(45),
  IN p_TelefonoHuesped VARCHAR(45),
  IN p_Origen VARCHAR(45),
  IN p_NombreContacto VARCHAR(45),
  IN p_TelefonoContacto VARCHAR(45),
  IN p_Observaciones VARCHAR(45),
  IN p_Observaciones2 VARCHAR(45)
)
BEGIN
  
  IF LENGTH(p_TelefonoHuesped) = 10 AND LEFT(p_TelefonoHuesped, 1) = '3' THEN
    INSERT INTO huesped (
      Nombre_completo, 
      tipo_documento, 
      Numero_documento, 
      Telefono_huesped, 
      Origen, 
      Nombre_Contacto, 
      `Telefono contacto`, 
      Observaciones, 
      observaciones2
    ) VALUES (
      p_NombreCompleto, 
      p_TipoDocumento, 
      p_NumeroDocumento, 
      p_TelefonoHuesped, 
      p_Origen, 
      p_NombreContacto, 
      p_TelefonoContacto, 
      p_Observaciones, 
      p_Observaciones2
    );
  ELSE
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Invalid Colombian phone number. It must be 10 digits and start with 3.';
  END IF;
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS InsertHuesped");
    }
};
