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
    return view('welcome');
});

Route::get('/product', 'ProductController@index');
Route::post('/product/create', 'ProductController@create');
Route::get('/product/{id}/edit','ProductController@edit');
Route::post('/product/{id}/update','ProductController@update');
Route::get('/product/{id}/delete','ProductController@delete');