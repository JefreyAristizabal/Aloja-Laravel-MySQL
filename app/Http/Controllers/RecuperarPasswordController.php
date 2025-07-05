<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class RecuperarPasswordController extends Controller
{
    // Clave AES-256 en hexadecimal
    private string $key_hex = '14485940e7b744fc60867fcc77c96fe28c29cbe15a668ba6b4e7dc8bb38814e1';

    /**
     * Muestra el formulario de recuperación
     */
    public function showForm()
    {
        return view('recuperar');
    }

    /**
     * Procesa el restablecimiento de contraseña
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'user' => 'required|string',
            'nombre' => 'required|string'
        ]);

        $usuario = trim($request->input('user'));
        $nombre = trim($request->input('nombre'));

        // Buscar coincidencia exacta
        $empleado = DB::table('empleado')
            ->where('Usuario', $usuario)
            ->where('Nombre_Completo', $nombre)
            ->first();

        if ($empleado) {
            $nuevaPass = $this->generateRandomPassword();
            $encryptedPassword = $this->encryptPassword($nuevaPass);

            DB::table('empleado')
                ->where('idEmpleado', $empleado->idEmpleado)
                ->update(['Password' => $encryptedPassword]);

            return redirect()->route('response')->with('success', 'Contraseña restablecida correctamente. Tu nueva contraseña es: ' . $nuevaPass)
                ->with('redirect_to', route('login.form'));
        } else {
            return redirect()->route('response')->with('error', 'Usuario o nombre completo incorrectos.')
                ->with('redirect_to', route('recuperar.form'));
        }
    }

    private function encryptPassword(string $password): string
    {
        $key = hex2bin($this->key_hex);
        $iv = random_bytes(16);
        $encrypted = openssl_encrypt($password, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $encrypted);
    }

    private function generateRandomPassword(int $length = 10): string
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$!%*?';
        return substr(str_shuffle(str_repeat($chars, ceil($length / strlen($chars)))), 0, $length);
    }
}

