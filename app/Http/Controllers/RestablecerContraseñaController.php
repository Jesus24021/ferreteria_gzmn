<?php

namespace App\Http\Controllers;

use App\Mail\CambiarContraseniaMailable;
use App\Mail\CambiarContrasenniaMailable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RestablecerContraseñaController extends Controller
{
    public function showResetForm(){
        return view('recuperacion_contrasenia'); //vista del cuerpo de el correo de la recuperacion
    }

    public function showResetFormWithToken($token){
        try {
            $res = DB::connection('mysql')
                ->table('usuarios')
                ->where('expira_toke')
                ->where('valor_token',"=", $token)
                ->first();

            if ($res) {
                $fechaExpiracion = Carbon::parse($res->token_expiracion);
                $fechaActual = Carbon::now();
                if ($fechaActual->greaterThan($fechaExpiracion)) {
                    return view('recuperacion_contrasenia',[
                        'token' => $token
                    ]);
                }
                else{
                    $MensajeError="El enlace ha expirado";
                    return redirect(route('login'))
                        ->with('sessionCambiarContrasennia', 'false')
                        ->with('mensaje', $MensajeError);
                }
            }
            else{
                $mensajeError = "El enlace no existe o ha expirado";
                return redirect()->route('login')
                    ->with("sessionCambiarContrasenia", false)
                    ->with("mensaje", $mensajeError);
            }

        } catch (\Swift_TransportException $e){
            $MensajeError="Hubo un error con las credenciales de correo";
            return redirect(route('password.reset'))
                ->with('sessionCambiarContrasennia', 'false')
                ->with('mensaje', $MensajeError); //With envía en una session flash dos claves y sus valores
        }
        catch (\Exception $e){
            $MensajeError="Hubo un error en el servidor";
            return redirect(route('password.reset'))
                ->with('sessionCambiarContrasennia', 'false')
                ->with('mensaje', $MensajeError); //With envía en una session flash dos claves y sus valores
        }
    }

    public function sendResetLinkEmail(Request $request){
        $request->validate(['correo' => 'required|email']);

        try {
            $usuario = DB::table('usuarios')
                ->where('correo_electronico', $request->correo)
                ->where('activo', 1)
                ->first();

            if (!$usuario) {
                return back()->with('error', 'Correo no registrado.');
            }

            $token = Str::random(60);
            $expiraEn = Carbon::now()->addMinutes(10);


            DB::table('usuarios')
                ->where('id', $usuario->id)
                ->update([
                    'valor_token' => $token,
                    'expira_token' => $expiraEn,
                ]);

            Mail::to($request->correo)
                ->send(new CambiarContrasenniaMailable($usuario->nombre_completo, $token));

            return back()->with('success', 'Correo de recuperación enviado.');

        } catch (\Exception $e) {
            return back()->with('error', 'Error en el servidor. Inténtalo más tarde.');
        }
    }
}

