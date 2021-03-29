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


//Rutas de Inicdencias
Route::get('/incidencas/index', 'IncidenceController@index')->name('incidencias.index')->middleware('auth');
Route::get('/incidencas/create', 'IncidenceController@create')->name('incidencias.create')->middleware('auth');
Route::post('/incidencas/store', 'IncidenceController@store')->name('incidencias.store')->middleware('auth');
Route::get('/incidencas/show/{indidency}', 'IncidenceController@show')->name('incidencias.show')->middleware('auth');
Route::get('/incidencas/edit/{indidency}', 'IncidenceController@edit')->name('incidencias.edit')->middleware('auth');
Route::post('/incidencas/update/{indidency}', 'IncidenceController@update')->name('incidencias.update')->middleware('auth');