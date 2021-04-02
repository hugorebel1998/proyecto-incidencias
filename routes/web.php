<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(route('home'));
    } else {
        return view('auth.login');
    }
});

Auth::routes();
Auth::routes(['register' => false]);
Route::match(['get', 'post'], 'register', function () {
    return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:admin']], function () {

    // Rutas de usuarios
    Route::get('/usuarios/index', 'UserController@index')->name('usuarios.index')->middleware('auth');
    Route::get('/usuarios/create', 'UserController@create')->name('usuarios.create')->middleware('auth');
    Route::post('/usuarios/store', 'UserController@store')->name('usuarios.store')->middleware('auth');
    Route::get('/usuarios/show/{usuario}', 'UserController@show')->name('usuarios.show')->middleware('auth');
    Route::get('/usuarios/edit/{usuario}', 'UserController@edit')->name('usuarios.edit')->middleware('auth');

    Route::get('/usuarios/contrasena/{usuario}', 'UserController@contrasena')->name('usuarios.contrasena')->middleware('auth');
    Route::post('/usuarios/cambiar', 'UserController@cambiar')->name('usuarios.cambiar')->middleware('auth');
    
    Route::post('/usuarios/update/{usuario}', 'UserController@update')->name('usuarios.update')->middleware('auth');
    Route::get('/usuarios/delete/{usuario}', 'UserController@delete')->name('usuarios.delete')->middleware('auth');

    //Rutas de Inicdencias
    Route::get('/incidencas/index', 'IncidenceController@index')->name('incidencias.index')->middleware('auth');
    Route::get('/incidencas/create', 'IncidenceController@create')->name('incidencias.create')->middleware('auth');
    Route::post('/incidencas/store', 'IncidenceController@store')->name('incidencias.store')->middleware('auth');
    Route::get('/incidencas/show/{indidency}', 'IncidenceController@show')->name('incidencias.show')->middleware('auth');
    Route::get('/incidencas/edit/{indidency}', 'IncidenceController@edit')->name('incidencias.edit')->middleware('auth');
    Route::post('/incidencas/update/{indidency}', 'IncidenceController@update')->name('incidencias.update')->middleware('auth');
    Route::get('/incidencas/delete/{indidency}', 'IncidenceController@delete')->name('incidencias.delete')->middleware('auth');

    //Rutas proyecto
    Route::get('/proyectos/index', 'ProyectController@index')->name('proyectos.index')->middleware('auth');
    Route::get('/proyectos/create', 'ProyectController@create')->name('proyectos.create')->middleware('auth');
    Route::post('/proyectos/store', 'ProyectController@store')->name('proyectos.store')->middleware('auth');
    Route::get('/proyectos/show/{project}', 'ProyectController@show')->name('proyectos.show')->middleware('auth');
    Route::get('/proyectos/edit/{project}', 'ProyectController@edit')->name('proyectos.edit')->middleware('auth');
    Route::post('/proyectos/update/{project}', 'ProyectController@update')->name('proyectos.update')->middleware('auth');

    Route::get('/categorias/index', 'CategoryController@index')->name('categorias.index')->middleware('auth');
    Route::get('/categorias/create', 'CategoryController@create')->name('categorias.create')->middleware('auth');
    Route::post('/categorias/store', 'CategoryController@store')->name('categorias.store')->middleware('auth');
    Route::get('/categorias/show/{category}', 'CategoryController@show')->name('categorias.show')->middleware('auth');
    Route::get('/categorias/edit/{category}', 'CategoryController@edit')->name('categorias.edit')->middleware('auth');
    Route::post('/categorias/update/{category}', 'CategoryController@update')->name('categorias.update')->middleware('auth');


});
