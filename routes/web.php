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

Route::get('manufacturers',function(){
	return view('manufacturer.index');
});

Route::get('manufacturers/crear',function(){
	return view('manufacturer.crear');
});

Route::get('manufacturers/editar/{id}',function($id){
	return view('manufacturer.editar')->with('id',$id);
});