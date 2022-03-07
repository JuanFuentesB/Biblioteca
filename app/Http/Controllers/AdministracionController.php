<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Usuario;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\LibroFormRequest;
use DB;

class AdministracionController extends Controller
{
    public function index(){
        //Auth::logout();
        return view('libros');
    }

    public function listLibros(){
        $libros = Libro::All();

        return $libros;
    }

    public function destroy($id){

       Libro::destroy($id);
        
        return "exito";
    }

    public function addLibro(LibroFormRequest $request){
        $libro = new Libro;
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->ano = $request->ano;
        $libro->save();
        
        return "Exito";
    }

    public function updateLibro(LibroFormRequest $request){

        $libro = Libro::find($request->id);
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->ano = $request->ano;
        $libro->save();
        
        return "Exito";
    }

    public function getlibrosprestados(){
        
        $libro = DB::SELECT('
        SELECT libros.id, libros.titulo, libros.autor, libros.editorial, libros.ano, libros.usuario_id, usuarios.nombre
        FROM libros, usuarios
        WHERE libros.usuario_id = usuarios.id');

        return $libro;
    }
}
