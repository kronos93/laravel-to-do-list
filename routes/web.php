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
Auth::routes();

Route::get('/', 'ToDoController@index');
Route::resource('todo', 'ToDoController');
Route::get('/update-status-task/{task}', 'ToDoController@updateStatusTask')->name('todo.update-status-task');
Route::post('/send-invitation', 'ToDoController@sendInvitation')->name('todo.send-invitation');
