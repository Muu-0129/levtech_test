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

/*
Route::get('/',function() {
    return view('index');
    })                                          #lesson_8-2
*/

/*
Route::get('/posts', 'PostController@index');   #lesson_8-1
*/

Route::get('/', 'PostController@index');    #7-3-2
Route::get('/posts/create', 'PostController@create');  
Route::get('/posts/{post}', 'PostController@show');

Route::post('/posts', 'PostController@store');

?>