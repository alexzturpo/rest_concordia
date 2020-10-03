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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/almacen/producto','ProductoController');
Route::resource('/almacen/categoria','CategoriaController');
Route::resource('/almacen/gastosa','GastosAController');
Route::resource('/almacen/platosv','PlatoAController');

Route::resource('/cocinero/producto','ProductoCController');
Route::resource('/cocinero/menu','MenuController');
Route::resource('/cocinero/odenes','OrdenCController');
Route::resource('/cocinero/gastos','GastosCController');

//Route::resource('/mesero/newcompra','MeseroController');
Route::resource('/mesero2/orden','Mesero2Controller');

Route::resource('/salidas/personal','PersonalController');
Route::resource('/compras/proveedor','ProveedorController');
Route::resource('/compras/ingreso','IngresoController');
Route::resource('/salidas/salida','SalidaController');
Route::resource('/seguridad/usuario','UsuarioController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout','Auth\LoginController@logout');
