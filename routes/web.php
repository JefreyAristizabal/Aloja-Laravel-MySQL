<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\EstadiaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UpdatePasswordController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [IndexController::class, 'index'])->name('inicio');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Cambiar contraseña (vista)
Route::get('/cambiar_contraseña', function () {
    if (!session()->has('usuario')) return redirect('/login');
    return view('cambiar_contraseña');
});

// Paneles por rol
// GRUPO DE RUTAS PARA EL PANEL DE ADMINISTRACIÓN (MÉTODO RECOMENDADO)
Route::middleware(['auth.admin'])->prefix('admin')->name('admin.')->group(function () {

    // Ruta para el panel principal
    Route::get('/panel', [AdminDashboardController::class, 'index'])->name('panel');

    // RUTAS PARA ESTADÍAS
    // Muestra la tabla (URL: /admin/estadias)
    Route::get('/estadias', [EstadiaController::class, 'index'])->name('estadias.index');
    // Muestra el formulario de agregar (URL: /admin/estadias/crear)
    Route::get('/estadias/crear', [EstadiaController::class, 'create'])->name('estadias.create');

    // Guarda una nueva estadía (URL: /admin/estadias/guardar)
    Route::post('/estadias/guardar', [EstadiaController::class, 'store'])->name('estadias.store');

    Route::get('/estadias/{id}/editar', [EstadiaController::class, 'edit'])->name('estadias.edit');

    Route::put('/estadias/{id}', [EstadiaController::class, 'update'])->name('estadias.update');

    Route::delete('/estadias/{id}', [EstadiaController::class, 'destroy'])->name('admin.estadias.destroy');

    Route::get('/cambiar_contraseña', [UpdatePasswordController::class, 'index'])->name('cambiar_contraseña');
    Route::patch('/cambiar_contraseña', [UpdatePasswordController::class, 'actualizarPassword'])->name('cambiar_contraseña.update');

    Route::get('/response', function () {
        return view('layouts.app');
    })->name('response');

    // ... define aquí las demás rutas para huéspedes, habitaciones, etc.
});

// GRUPO DE RUTAS PARA EL PANEL DE EMPLEADO
Route::middleware(['auth.empleado'])->prefix('empleado')->name('empleado.')->group(function () {
    Route::get('/panel', function () {
        return view('empleado.panelempleado'); // O una vista de dashboard específica
    })->name('panel');
    // Aquí puedes agregar más rutas específicas para el panel de empleado
});

// Rutas para recuperar contraseña
Route::get('/recuperar', [App\Http\Controllers\RecuperarPasswordController::class, 'showForm'])->name('recuperar.form');
Route::post('/recuperar', [App\Http\Controllers\RecuperarPasswordController::class, 'resetPassword'])->name('recuperar.reset');


Route::get('/response', function () {
    return view('layouts.app');
})->name('response');

Route::fallback(function () {
    return redirect('/');
});

