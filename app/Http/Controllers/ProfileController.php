<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function showProfile(){
        if (session()->has('nombreCompleto')) {
            return view('dashboard');
        }
        else{
            return redirect('/login')
                ->with('activo','false')
                ->with('mensaje','La sesion ha terminado');
        }
    }
}
