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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/users', 'User\UserController@index')->name('users');

Route::get('/users/create', 'User\UserController@getCreateUser')->name('create_user');

Route::post('/users/create', 'User\UserController@postCreateUser')->name('create_user_post');

Route::post('/users/{id}/delete', 'User\UserController@postDeleteUser')->name('delete_user_post');

Route::get('/users/{id}', 'User\UserController@getEditUser')->name('edit_user');

Route::post('/users/{id}', 'User\UserController@postEditUser')->name('edit_user_post');

Route::get('/projects', 'Projects\ProjectController@index')->name('get_projects');

Route::get('/projects/create', 'Projects\ProjectController@getCreateProject')->name('get_create_project');

Route::post('/projects/create', 'Projects\ProjectController@postCreateProject')->name('post_create_project');
