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
Route::get('cadastro', 'App\Http\Controllers\AuthController@getcadastro')->name('app.cadastro');
Route::post('cadastro', 'App\Http\Controllers\AuthController@cadastro')->name('app.cadastro');
Route::post('login', 'App\Http\Controllers\AuthController@login')->name('app.login');
Route::get('login', 'App\Http\Controllers\AuthController@getlogin')->name('app.login');


//Rotas Autenticadas
Route::middleware('auth')->group(function() {
    Route::get('menu', 'App\Http\Controllers\MenuController@getMenu')->name('app.menu');
    Route::get('entrada/{id}', 'App\Http\Controllers\MenuController@getEntrada')->name('app.entrada');
    Route::get('saida/{id}', 'App\Http\Controllers\MenuController@getSaida')->name('app.saida');
    Route::post('wallet', 'App\Http\Controllers\MenuController@wallet')->name('app.wallet');
    Route::put('edit/{id}', 'App\Http\Controllers\MenuController@edit')->name('app.edit');
    Route::post('logout', 'App\Http\Controllers\MenuController@logout')->name('app.logout');
    Route::post('delete/{id}', 'App\Http\Controllers\MenuController@delete')->name('app.deletar');
});