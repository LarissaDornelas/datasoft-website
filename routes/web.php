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
})->name('login');

Route::post('login', 'Auth\LoginController@login')->name('postLogin');
Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return redirect(\URL::previous());
})->name('logout');



Route::get('/admin/usuarios', 'UsersController@getUsers')->middleware('auth')->name('showUsers');
Route::post('/admin/usuarios', 'UsersController@createUser')->middleware('auth')->name('createUser');
Route::get('/admin/editar-perfil', 'UsersController@getProfile')->middleware('auth')->name('showProfile');
Route::post('/admin/alterar-nome', 'UsersController@changeName')->middleware('auth')->name('changeName');
Route::post('/admin/alterar-senha', 'UsersController@changePassword')->middleware('auth')->name('changePassword');
Route::delete('/admin/excluir-conta', 'UsersController@deleteAccount')->middleware('auth')->name('deleteAccount');

Route::get('/admin/{page}', 'ContentController@getContent')->middleware('auth')->name('showContent');
Route::post('/admin/{page}/editar', 'ContentController@editContent')->middleware('auth')->name('editContent');
