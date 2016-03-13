<?php
use Illuminate\Support\Facades\Input;
/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'Contatos@index');

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['prefix'=>'contatos'], function() {

    Route::get('index', 'Contatos@index');
    
    Route::post('add', 'Contatos@add');
    
    Route::post('listar', 'Contatos@listar');
    
    Route::post('novoContato', 'Contatos@novo');

    Route::post('excluir/{id}', 'Contatos@excluir');

    Route::post('buscar/{id}', 'Contatos@buscar');
    
    Route::post('editar/{id}', 'Contatos@editar');
});
