<?php

namespace App\Http\Controllers;

use App\Models\ferreteria\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showloginForm(){
        return view('login');
    }

    public function login(Request $request)
    {
        $correo_electronico = $request->email; //
        $contrasennia = $request->contrasennia;

        try {
            $reUsuario = DB::connection('mysql')
                ->table('usuarios')
                ->select('id', 'nombre_completo', 'contrasennia', 'activo') // Asegúrate que el nombre de la columna coincida
                ->where('correo_electronico', '=', $correo_electronico)
                ->where('activo', '=', 1)
                ->first();


            Usuario::first();

            if ($reUsuario) {
                // Corrige la variable de contraseña (debe coincidir con el nombre de la columna)
                if (Hash::check($contrasennia, $reUsuario->contrasennia)) {
                    session()->put('id', $reUsuario->id);
                    session()->put('nombreCompleto', $reUsuario->nombre_completo);
                    return redirect('/profile');
                } else {
                    return redirect('/login')
                        ->with('activo', 'false')
                        ->with('mensaje', 'Correo Electrónico o Contraseña Incorrecta');
                }
            } else {
                return redirect('/login')
                    ->with('activo', 'false')
                    ->with('mensaje', 'Confirma tu Correo');
            }
        }
        catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function logout()
    {

        session()->forget('id');
        session()->forget('nombreCompleto');
        return redirect('/login');
    }
}
