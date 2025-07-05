<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Empleado;

class AuthController extends Controller
{
    private string $key = "14485940e7b744fc60867fcc77c96fe28c29cbe15a668ba6b4e7dc8bb38814e1";

    public function showLogin()
    {
        return view('log-in');
    }

    public function login(Request $request)
    {
        $usuario = $request->user;
        $passwordIngresado = $request->password;

        $empleado = Empleado::where('Usuario', $usuario)->first();

        if (!$empleado) return redirect()->route('response')->with('error', 'Usuario no encontrado.')->with('redirect_to', route('login.form'));

        $clave = hex2bin($this->key);
        $data = base64_decode($empleado->Password);
        $iv = substr($data, 0, 16);
        $cifrado = substr($data, 16);
        $passwordDescifrado = openssl_decrypt($cifrado, 'aes-256-cbc', $clave, OPENSSL_RAW_DATA, $iv);

        if ($passwordIngresado === $passwordDescifrado) {
            Session::put('usuario', $empleado->Usuario);
            Session::put('rol', $empleado->Rol);
            Session::put('idEmpleado', $empleado->idEmpleado);

            return match ($empleado->Rol) {
                'ADMIN' => redirect()->route('admin.panel'),
                'EMPLEADO' => redirect()->route('empleado.panel'),
                default => redirect('/'),
            };
        } else {
            return redirect()->route('response')->with('error', 'Contraseña incorrecta.')->with('redirect_to', route('login.form'));
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
