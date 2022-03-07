<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegistroFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;

class AuthController extends Controller
{
    public function iniciarSession(LoginFormRequest $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->pass], false)) {
            
            if(Auth::check()){
                $rol = Auth::user()->rol;
    
                if($rol == 1){
                    //administrativo
                    return redirect('/administracion');
                } else if ($rol == 2){
                    //prestar
                    return redirect('/prestatarios');
                }
            }
            
        } else {
            
            return response()->json(['errors' => ['login' => ['los datos son incorrectos ']]], 422);
        }
    }

    public function addusuario(RegistroFormRequest $request){

        $usuario = new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->rol = $request->tusuario;
        $usuario->save();

        Auth::loginUsingId($usuario->id);

        if(Auth::check()){
            $rol = Auth::user()->rol;

            if($rol == 1){
                //administrativo
                return redirect('/administracion');
            } else if ($rol == 2){
                //prestar
                return redirect('/prestatarios');
            }
        }
    }

    public function cerrarsession(){
        //cerrar session
        Auth::logout();

        return redirect('/');
    }
}
