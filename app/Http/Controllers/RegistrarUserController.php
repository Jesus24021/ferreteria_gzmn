<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmarCorreoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrarUserController extends Controller
{
    public function index(){
      //  echo "Pagina web * Muestra la infromacion de todos los usuarios";
    }
    public function create(){
       return view('Crear_cuenta');
    }
    // Agarra las variables de Query o del formulario con Request
    public function store(Request $request){
        $nombre=$request->nombre;
        $usuario=$request->usuario;
        $correo=$request->correo;
        $contrasennia=$request->contrasennia;
        $contrasenniaCifrada= Hash::make($contrasennia);




//        echo "funciinalidad";
//        echo "<br> Usuario: $user, <br> Email:$email, <br> Pass:$pass";
        DB::insert('INSERT INTO usuarios(id_rol,nombre_completo,nombre_usuario, correo_electronico, contrasennia, activo) VALUES(?,?,?,?,?,?)', [6,$nombre,$usuario,$correo,$contrasenniaCifrada,0]);

        mail::to($correo)->send(new ConfirmarCorreoMailable($nombre,$correo));


        return redirect('login');



    }
    public function ConfirmarCorreo($correo){
        DB::connection('mysql')->
        table('usuarios')
            ->where('correo_electronico','=', $correo)
            ->update(['activo' => 1]);

        return redirect('mensajecorreoconfirmado',['correo' => $correo]);
    }
    public function apiShowAll (){
        $reUsuario = DB::connection('mysql')
            ->table('usuarios')
            ->select('id', 'nombre_completo', 'nombre_usuario','correo_electronico','contrasennia', 'activo')
            ->get();

        return response()->json($reUsuario, 200);

    }
}
