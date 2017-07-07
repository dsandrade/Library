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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function() {
    Route::resource('clientes', 'UserController');
    Route::resource('autores', 'AuthorController');
    Route::resource('leitores', 'ReaderController');
    Route::resource('editoras', 'PublisherController');
    Route::resource('livros', 'BookController');
    Route::resource('livrosautores', 'Book_AuthorController');
    Route::resource('emprestimos', 'LoanController');
});