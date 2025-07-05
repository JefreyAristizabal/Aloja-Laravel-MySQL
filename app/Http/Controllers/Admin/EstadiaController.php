<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Estadium as Estadia;

class EstadiaController extends Controller
{
    /**
     * Muestra la tabla de estadías.
     */
    public function index()
    {
        $estadias = DB::table('estadia')
            ->get();
        return view('admin.sections.tabla.estadia', [
            'estadias' => $estadias,
        ]);
    }

    /**
     * Muestra el formulario para agregar una nueva estadía.
     */
    public function create()
    {
        return view('admin.sections.agregar.estadia');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Fecha_Inicio' => 'required|date',
            'Fecha_Fin' => 'required|date|after_or_equal:Fecha_Inicio',
            'Costo' => 'required|numeric|min:0',
            'Habitacion_idHabitacion' => 'required|integer|exists:habitacion,idHabitacion',
        ], [
            'Fecha_Inicio.required' => 'La fecha de inicio es obligatoria.',
            'Fecha_Inicio.date' => 'La fecha de inicio no es válida.',
            'Fecha_Fin.required' => 'La fecha de fin es obligatoria.',
            'Fecha_Fin.date' => 'La fecha de fin no es válida.',
            'Fecha_Fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'Costo.required' => 'El costo es obligatorio.',
            'Costo.numeric' => 'El costo debe ser un número válido.',
            'Costo.min' => 'El costo no puede ser negativo.',
            'Habitacion_idHabitacion.required' => 'Debe seleccionar una habitación.',
            'Habitacion_idHabitacion.integer' => 'El ID de habitación no es válido.',
            'Habitacion_idHabitacion.exists' => 'La habitación seleccionada no existe.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.response')
                ->withErrors($validator)
                ->withInput()
                ->with('redirect_to', route('admin.estadias.create'));
        }

        // Validar que no haya choque de fechas
        $fechaInicio = $request->input('Fecha_Inicio');
        $fechaFin = $request->input('Fecha_Fin');
        $habitacionId = $request->input('Habitacion_idHabitacion');

        $choque = Estadia::where('Habitacion_idHabitacion', $habitacionId)
            ->where(function ($query) use ($fechaInicio, $fechaFin) {
                $query->whereBetween('Fecha_Inicio', [$fechaInicio, $fechaFin])
                      ->orWhereBetween('Fecha_Fin', [$fechaInicio, $fechaFin])
                      ->orWhere(function ($q) use ($fechaInicio, $fechaFin) {
                          $q->where('Fecha_Inicio', '<=', $fechaInicio)
                            ->where('Fecha_Fin', '>=', $fechaFin);
                      });
            })
            ->exists();

        if ($choque) {
            return redirect()
                ->route('admin.response')
                ->with('error', 'Ya existe una estadía para esta habitación en ese rango de fechas.')
                ->withInput()
                ->with('redirect_to', route('admin.estadias.create'));
        }

        try {
            $estadia = new Estadia();
            $estadia->Fecha_Inicio = $fechaInicio;
            $estadia->Fecha_Fin = $fechaFin;
            $estadia->Fecha_Registro = now();
            $estadia->Costo = $request->Costo;
            $estadia->Habitacion_idHabitacion = $habitacionId;
            $estadia->save();

            return redirect()
                ->route('admin.response')
                ->with('success', 'Estadía registrada correctamente.')
                ->with('redirect_to', route('admin.estadias.index'));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.response')
                ->with('error', 'Ocurrió un error al guardar la estadía: ' . $e->getMessage())
                ->with('redirect_to', route('admin.estadias.create'));
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Fecha_Inicio' => 'required|date',
            'Fecha_Fin' => 'required|date|after_or_equal:Fecha_Inicio',
            'Costo' => 'required|numeric|min:0',
            'Habitacion_idHabitacion' => 'required|integer|exists:habitacion,idHabitacion',
        ], [
            'Fecha_Inicio.required' => 'La fecha de inicio es obligatoria.',
            'Fecha_Inicio.date' => 'La fecha de inicio no es válida.',
            'Fecha_Fin.required' => 'La fecha de fin es obligatoria.',
            'Fecha_Fin.date' => 'La fecha de fin no es válida.',
            'Fecha_Fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'Costo.required' => 'El costo es obligatorio.',
            'Costo.numeric' => 'El costo debe ser un número válido.',
            'Costo.min' => 'El costo no puede ser negativo.',
            'Habitacion_idHabitacion.required' => 'Debe seleccionar una habitación.',
            'Habitacion_idHabitacion.integer' => 'El ID de habitación no es válido.',
            'Habitacion_idHabitacion.exists' => 'La habitación seleccionada no existe.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.response')
                ->withErrors($validator)
                ->withInput()
                ->with('redirect_to', route('admin.estadias.edit', $id));
        }

        $fechaInicio = $request->input('Fecha_Inicio');
        $fechaFin = $request->input('Fecha_Fin');
        $habitacionId = $request->input('Habitacion_idHabitacion');

        // Validar que no haya choque con otras estadías (excepto esta misma)
        $choque = Estadia::where('Habitacion_idHabitacion', $habitacionId)
            ->where('idEstadia', '!=', $id) // Ignorar la estadía actual
            ->where(function ($query) use ($fechaInicio, $fechaFin) {
                $query->whereBetween('Fecha_Inicio', [$fechaInicio, $fechaFin])
                      ->orWhereBetween('Fecha_Fin', [$fechaInicio, $fechaFin])
                      ->orWhere(function ($q) use ($fechaInicio, $fechaFin) {
                          $q->where('Fecha_Inicio', '<=', $fechaInicio)
                            ->where('Fecha_Fin', '>=', $fechaFin);
                      });
            })
            ->exists();

        if ($choque) {
            return redirect()
                ->route('admin.response')
                ->with('error', 'Ya existe una estadía para esta habitación en ese rango de fechas.')
                ->withInput()
                ->with('redirect_to', route('admin.estadias.edit', $id));
        }

        try {
            $estadia = Estadia::findOrFail($id);
            $estadia->Fecha_Inicio = $fechaInicio;
            $estadia->Fecha_Fin = $fechaFin;
            $estadia->Costo = $request->Costo;
            $estadia->Habitacion_idHabitacion = $habitacionId;
            $estadia->save();

            return redirect()
                ->route('admin.response')
                ->with('success', 'Estadía actualizada correctamente.')
                ->with('redirect_to', route('admin.estadias.index'));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.response')
                ->with('error', 'Ocurrió un error al actualizar la estadía: ' . $e->getMessage())
                ->with('redirect_to', route('admin.estadias.edit', $id));
        }
    }

    public function edit($id)
    {
        $estadia = Estadia::findOrFail($id);
        return view('admin.sections.editar.estadia', compact('estadia'));
    }

    public function destroy($id)
    {
        try {
            $estadia = Estadia::findOrFail($id);
            $estadia->delete();

            return redirect()
                ->route('admin.response')
                ->with('success', 'Estadía eliminada correctamente.')
                ->with('redirect_to', route('admin.estadias.index'));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.response')
                ->with('error', 'No se pudo eliminar la estadía: ' . $e->getMessage())
                ->with('redirect_to', route('admin.estadias.index'));
        }
    }


}