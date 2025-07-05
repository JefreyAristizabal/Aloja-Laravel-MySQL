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
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertEstadia`(
  IN p_Fecha_Inicio DATE,
  IN p_Fecha_Fin DATE,
  IN p_Habitacion_idHabitacion INT,
  IN p_Costo DOUBLE
)
BEGIN
  DECLARE v_Fecha_Actual DATE;
  SET v_Fecha_Actual = CURDATE();

  
  IF p_Fecha_Inicio < v_Fecha_Actual THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'La fecha de inicio no puede ser inferior a la fecha actual.';
  ELSE
    
    INSERT INTO estadia (Fecha_Inicio, Fecha_Fin, Habitacion_idHabitacion, Costo)
    VALUES (p_Fecha_Inicio, p_Fecha_Fin, p_Habitacion_idHabitacion, p_Costo);
  END IF;
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS InsertEstadia");
    }
};
