<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

 

Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/register', 'Auth\RegisterController@create');

 

Route::get('/admin', 'HomeController@index')->name('home');

 


Route::resource('admin/importar', 'ImportarController');
 

 



 

Route::get('admin/importar',function(){
    return view('productos.importar');
    });

Route::get('admin/consultas',function(){
    return view('productos.consultas');
    });
        
Route::get('obtenerProductos/', 'ProductosController@buscarProduco');


        
Route::post('import-list-excel','ProductosController@importExcel')->name('products.import.excel');
    
 