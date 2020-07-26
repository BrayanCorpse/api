<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// mostrar todos los datos de la tabla usuarios
Route::get('show','UsuariosController@show');

// mostrar todos los datos de la tabla Marcas
Route::get('showMarks','UsuariosController@showMarks');

// mostrar todos los datos de la tabla Modelos
Route::get('showModels','UsuariosController@showModels');


// mostrar todos los datos de la tabla usuarios
Route::get('show','UsuariosController@show');

// mostrar algunos datos de la tabla usuarios con sus relaciones a otras tablas
Route::get('showRelations','UsuariosController@showRelations');

// mostrar los datos de la tabla usuarios paginando los registros
Route::get('showPaginate','UsuariosController@showPaginate');


// mostrar algunos datos de la tabla usuarios con sus relaciones a otras tablas mediante el ID
Route::get('showById/{usuario_id}','UsuariosController@showById');

// Crear un nuevo registro en la tabla usuario
Route::post('store','UsuariosController@store');

// Crear un nuevo registro en la tabla usuario de forma corta
Route::post('storeShort','UsuariosController@storeShort');


// Modificar un registro en la tabla usuario
Route::put('update/{usuario_id}','UsuariosController@update');

// Modificar un registro en la tabla usuario de forma corta
Route::put('updateShort','UsuariosController@updateShort');


// Eliminar registros de la tabla usuarios
Route::delete('delete/{usuario_id}','UsuariosController@delete');

// Restaurar registros de la tabla usuarios
Route::patch('restore/{usuario_id}','UsuariosController@restore');

// Eliminar fisicamente registros de la tabla usuarios
Route::delete('forceDelete/{usuario_id}','UsuariosController@forceDelete');
