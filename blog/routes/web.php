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

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return view('notebookapp');
    });
    Route::resource('notebooks','NotebooksController');
    Route::get('notebooks/{id}/createNote',['as'=>'createNote','uses'=>'NotesController@createNote']);
    Route::resource('notes','NotesController');


});

Route::get('/personal', 'PersonalController@index');


Route::group(['middleware' => 'web'], function (){
    Route::get('/accountImg/{avatar_url}', 'PersonalController@getAccountImg');

    Route::post('/modifyAccount', 'PersonalController@modifyAccount');

    Route::get('/toModifyAccount', 'PersonalController@toModifyAccount');

    Route::get('/resetPassword', 'PersonalController@resetPassword');

    Route::get('/toResetPassword', 'PersonalController@toResetPassword');


    Route::post('resetPassword', 'PersonalController@resetPassword');



});
Route::get('/pdf','PdfController@index');


//Route::get('/home', 'HomeController@index');

Auth::routes();


