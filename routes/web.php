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
    return view('welcome2');
});


/*Route::group(['prefix' => 'admin'],function(){

	Route::resource('empleados','EmpleadosController');
}); */

/*Route::get('/empleados', 'EmpleadosController@index');

Route::get('/empleados/create', 'EmpleadosController@create');
Route::post('/empleados/store', 'EmpleadosController@store');*/


Route::resource('empleados','EmpleadosController');