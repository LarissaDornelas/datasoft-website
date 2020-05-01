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

Route::get('/', 'FirstPageController@getContent')->name('getFirstPageData');
Route::get('/portfolio', function () {
    return view('welcome');
});
Route::get('/downloads', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin/login');
});

Route::get('/admin/usuarios', 'UsersController@getUsers')->name('showUsers');
Route::post('/admin/usuarios', 'UsersController@createUser')->name('createUser');


Route::get('/admin/{page}', 'ContentController@getContent')->name('showContent');
Route::post('/admin/{page}/editar', 'ContentController@editContent')->name('editContent');
