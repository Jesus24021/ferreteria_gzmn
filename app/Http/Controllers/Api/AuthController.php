<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use App\Models\ferreteria\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->all(); // Esto asegura que se obtienen los datos correctamente

        $validarDatos = Validator::make($data, [
            'correo_electronico' => 'required|email',
            'contrasennia' => 'required',
        ]);

        if ($validarDatos->fails()) {
            return response()->json([
                'message' => 'Error en la validación',
                'errors' => $validarDatos->errors(),
            ], 422);
        }

        $usuario = Usuario::where('correo_electronico', $data['correo_electronico'])->first();

        if (!$usuario || !Hash::check($data['contrasennia'], $usuario->contrasennia)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        return response()->json([
            'message' => 'Bienvenido',
            'usuario' => $usuario,
        ], 200);
    }


}
