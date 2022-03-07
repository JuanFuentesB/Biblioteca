<?php

use Illuminate\Support\Facades\Route;

Route::post('/iniciar-session', 'AuthController@iniciarSession');

Route::post('/agregar-usuario', 'AuthController@addusuario');

Route::get('/cerrarsession', 'AuthController@cerrarsession')->name('cerrarsession');

Route::middleware('guest')->group(function (){
    Route::get('/', function () { return view('login');  })->name('login');

    Route::get('/agregarU', function () { return view('AgregarUsuario');  })->name('agregarusuario');
});

Route::middleware(['auth', 'admin'])->group(function(){
    //rutas de CRUD de libros
    Route::get('/administracion', 'AdministracionController@index');
    Route::get('/listLibros', 'AdministracionController@listLibros');
    Route::post('/addLibro', 'AdministracionController@addLibro');
    Route::put('/updateLibro', 'AdministracionController@updateLibro');
    Route::delete('/eliminarLibro/{id}', 'AdministracionController@destroy');

    
    //libros prestados
    Route::get('/getlibrosprestados', 'AdministracionController@getlibrosprestados');
});

Route::middleware(['auth','estandar'])->group(function(){
    Route::get('/prestatarios', 'PrestatariosController@index');
    Route::get('/misLibros', 'PrestatariosController@misLibros');
    Route::get('/listarLibros', 'PrestatariosController@listarLibros');
    Route::put('/regresarLibro/{id}', 'PrestatariosController@regresarLibro');
    Route::put('/pedirLibro/{id}', 'PrestatariosController@pedirLibro');
});