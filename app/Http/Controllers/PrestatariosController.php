<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Libro;

class PrestatariosController extends Controller
{
    public function index(){
        return view('prestar');
    }

    public function misLibros(){

        if(Auth::check()){
            $user_id = Auth::user()->id;

            $libros = Libro::where('usuario_id', $user_id)->get();

            return $libros;
        }
    }

    public function listarLibros(){
        $libros = Libro::where('usuario_id', null)->get();

        return $libros;
    }

    public function regresarLibro($id){
        $libro = Libro::find($id);

        $libro->usuario_id = null;
        $libro->save();

        return "Exito";
    }

    public function pedirLibro($id){

        if(Auth::check()){
            $user_id = Auth::user()->id;

            $libro = Libro::find($id);

            $libro->usuario_id = $user_id;
            $libro->save();

            return "Exito";
        }
    }

}
