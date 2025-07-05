<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // Trae las habitaciones para el carrusel
        $habitaciones = DB::table('habitacion as h')
            ->leftJoin('tarifa as t', 'h.idHABITACION', '=', 't.Habitacion_idHabitacion')
            ->select('h.*', 't.Valor as PRECIO', 't.Modalidad as MODALIDAD')
            ->orderByDesc('h.idHABITACION')
            ->get();


        // Puedes elegir destacadas de alguna forma
        $habitacionesDestacadas = DB::table('habitacion')
            ->inRandomOrder()
            ->limit(3)
            ->get();


        return view('index', [
            'habitaciones' => $habitaciones,
            'habitacionesDestacadas' => $habitacionesDestacadas,
        ]);
    }
}
