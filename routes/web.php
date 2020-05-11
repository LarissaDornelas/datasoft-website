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

Route::get('/', 'PagesController@getContentFirstPage')->name('getFirstPageData');

Route::get('/portfolio', 'PagesController@getContentPortfolio')->name('portfolio');

Route::get('/downloads', 'PagesController@getContentDownloads')->name('downloads');

Route::get('/admin', function () {
    return view('admin/login');
})->name('login');

Route::post('login', 'Auth\LoginController@login')->name('postLogin');
Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return redirect('/admin');
})->name('logout');



Route::get('/admin/usuarios', 'UsersController@getUsers')->middleware('auth')->name('showUsers');
Route::post('/admin/usuarios', 'UsersController@createUser')->middleware('auth')->name('createUser');
Route::get('/admin/editar-perfil', 'UsersController@getProfile')->middleware('auth')->name('showProfile');
Route::post('/admin/alterar-nome', 'UsersController@changeName')->middleware('auth')->name('changeName');
Route::post('/admin/alterar-senha', 'UsersController@changePassword')->middleware('auth')->name('changePassword');
Route::get('/admin/excluir-conta', 'UsersController@deleteAccount')->middleware('auth')->name('deleteAccount');
Route::post('/admin/{page}/editar', 'ContentController@editContent')->middleware('auth')->name('editContent');
Route::get('/admin/downloads', 'DownloadsController@getAll')->middleware('auth')->name('getDownloads');
Route::get('/admin/portfolio', 'PortfolioController@getAll')->middleware('auth')->name('getPortfolioData');
Route::post('/admin/downloads/excluir/{id}', 'DownloadsController@delete')->middleware('auth')->name('deleteDownload');
Route::post('/admin/downloads/{id}', 'DownloadsController@update')->middleware('auth')->name('editDownload');
Route::post('/admin/downloads', 'DownloadsController@create')->middleware('auth')->name('createDownload');
Route::post('/admin/portfolio/excluir/{id}', 'PortfolioController@delete')->middleware('auth')->name('deletePortfolio');
Route::post('/admin/portfolio/{id}', 'PortfolioController@update')->middleware('auth')->name('editPortfolio');
Route::post('/admin/portfolio', 'PortfolioController@create')->middleware('auth')->name('createPortfolio');
Route::get('/admin/{page}', 'ContentController@getContent')->middleware('auth')->name('showContent');
