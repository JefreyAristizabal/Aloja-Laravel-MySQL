<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class UpdatePasswordController extends Controller
{
    private string $key = "14485940e7b744fc60867fcc77c96fe28c29cbe15a668ba6b4e7dc8bb38814e1"; // Clave para cifrado AES-256-CBC
    /**
     * Muestra el formulario para cambiar la contraseña.
     */

    public function index(){
        $idEmpleado = session('idEmpleado');
        if (!$idEmpleado) {
            return redirect()->route('login.form')->with('error', 'Sesión no iniciada.');
        }

        $empleado = Empleado::find($idEmpleado);
        if (!$empleado) {
            return redirect()->back()->with('error', 'Empleado no encontrado.')->with('redirect_to', route('inicio'));
        }

        return view('cambiar_contraseña', compact('empleado'));
    }

    public function actualizarPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed', // new_password_confirmation requerido
        ]);

        $idEmpleado = session('idEmpleado');
        if (!$idEmpleado) {
            return redirect()->route('login.form')->with('error', 'Sesión no iniciada.');
        }

        $empleado = Empleado::find($idEmpleado);
        if (!$empleado) {
            return redirect()->route('admin.response')->with('error', 'Empleado no encontrado.')->with('redirect_to', route('login.form'));
        }

        $clave = hex2bin($this->key);
        $data = base64_decode($empleado->Password);
        $iv = substr($data, 0, 16);
        $cifrado = substr($data, 16);
        $passwordDescifrado = openssl_decrypt($cifrado, 'aes-256-cbc', $clave, OPENSSL_RAW_DATA, $iv);

        // Verificar contraseña actual
        if ($request->old_password !== $passwordDescifrado) {
            return redirect()->route('admin.response')->with('error', 'La contraseña actual es incorrecta.')->with('redirect_to', route('admin.cambiar_contraseña'));
        }

        // Cifrar nueva contraseña
        $nuevoIV = random_bytes(16);
        $nuevoCifrado = openssl_encrypt($request->new_password, 'aes-256-cbc', $clave, OPENSSL_RAW_DATA, $nuevoIV);
        $nuevoPasswordCodificado = base64_encode($nuevoIV . $nuevoCifrado);

        // Actualizar contraseña en DB
        $empleado->Password = $nuevoPasswordCodificado;
        $empleado->save();

        return redirect()->route('admin.response')->with('success', 'Contraseña actualizada correctamente.')->with('redirect_to', route('inicio'));
    }

}
