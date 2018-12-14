<?php

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

Route::get('/main', function () {
    return view('contenido/contenido');
})->name('main');
Route::get('/cargo','CargoController@index');
Route::post('/cargo/registrar','CargoController@store');
Route::put('/cargo/actualizar','CargoController@update');
Route::put('/cargo/activar','CargoController@activar');
Route::put('/cargo/desactivar','CargoController@desactivar');
Route::get('/cargo/selectCargo','CargoController@selectCargo');

Route::get('/codigo','CodigoController@index');
Route::post('/codigo/registrar','CodigoController@store');
Route::put('/codigo/actualizar','CodigoController@update');
Route::put('/codigo/activar','CodigoController@activar');
Route::put('/codigo/desactivar','CodigoController@desactivar');

Route::get('/proceso','ProcesoController@index');
Route::post('/proceso/registrar','ProcesoController@store');
Route::put('/proceso/actualizar','ProcesoController@update');
Route::put('/proceso/activar','ProcesoController@activar');
Route::put('/proceso/desactivar','ProcesoController@desactivar');
Route::get('/proceso/selectProceso','ProcesoController@selectProceso');


Route::get('/tipo','TipoDeDocumentoController@index');
Route::post('/tipo/registrar','TipoDeDocumentoController@store');
Route::put('/tipo/actualizar','TipoDeDocumentoController@update');
Route::put('/tipo/activar','TipoDeDocumentoController@activar');
Route::put('/tipo/desactivar','TipoDeDocumentoController@desactivar');
Route::get('/tipo/selectTipo','TipoDeDocumentoController@selectTipo');

Route::get('/rol','RolController@index');
Route::get('/rol/selectRol','RolController@selectRol');

Route::get('/documento','DocumentoController@index');
Route::post('/documento/registrar','DocumentoController@store');
Route::put('/documento/actualizar','DocumentoController@update');
Route::put('/documento/activar','DocumentoController@activar');
Route::put('/documento/desactivar','DocumentoController@desactivar');

Route::get('/user','UserController@index');
Route::post('/user/registrar','UserController@store');
Route::put('/user/actualizar','UserController@update');
Route::put('/user/activar','UserController@activar');
Route::put('/user/desactivar','UserController@desactivar');
Route::get('/user/selectUser','UserController@selectUser');

// Auth::routes();

Route::get('/','Auth\LoginController@showLoginForm');
Route::post('/login','Auth\LoginController@login')->name('login');

Route::get('/home', 'HomeController@index')->name('home');
