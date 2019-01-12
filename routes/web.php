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

Route::get('/', 'BookController@index');

// Itt adom hozzá az elérési utat. Azt a hivatkozást amin keresztül a
// controllerem elérhető lesz
Route::resource('books','BookController');
