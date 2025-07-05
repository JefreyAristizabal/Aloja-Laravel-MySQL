<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Estadium as Estadia;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Muestra el panel de administración con estadísticas y datos relevantes.
     */
    public function index()
    {
        $now = Carbon::now();
        $nombreMes = ucfirst($now->translatedFormat('F')); // Ej: "Julio"
        $anioActual = $now->year;
        $mesActual = $now->month;

        // Totales
        $totalEstadias = DB::table('estadia')->count();
        $totalPagos = DB::table('pagos')->count();

        // Del mes actual
        $estadiasMes = DB::table('estadia')
            ->whereMonth('Fecha_Inicio', $mesActual)
            ->whereYear('Fecha_Inicio', $anioActual)
            ->count();

        $pagosMes = DB::table('pagos')
            ->whereMonth('Fecha_Pago', $mesActual)
            ->whereYear('Fecha_Pago', $anioActual)
            ->count();

        // Tablas
        $estadias = DB::table('estadia')->get();
        $huespedes = DB::table('huesped')->get();
        $habitaciones = DB::table('habitacion')->get();
        $tarifas = DB::table('tarifa')->get();

        return view('admin.sections.panel', compact(
            'totalEstadias', 'estadiasMes', 'totalPagos', 'pagosMes',
            'nombreMes', 'estadias', 'huespedes', 'habitaciones', 'tarifas'
        ));
    }

}