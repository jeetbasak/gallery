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
    return view('auth.login');
});

Auth::routes();


Route::group(['middleware'=>['auth','ActiveUser']],function(){
Route::get('/home', 'HomeController@index')->name('home');
//For admin
Route::group(['middleware'=>['AdminUser']],function(){


Route::get('/role', 'Admin\RoleController@index')->name('role.page');
Route::get('/role/add', 'Admin\RoleController@add_page')->name('role.add.page');
Route::post('/role/ins', 'Admin\RoleController@ins')->name('role.ins');
Route::get('/role/dlt/{id}', 'Admin\RoleController@dlt')->name('role.dlt');
Route::get('/role/edit/{id}', 'Admin\RoleController@edit')->name('role.edit');
Route::post('/role/upd', 'Admin\RoleController@upd')->name('role.upd');


Route::get('/users', 'Admin\UserController@index')->name('user.page');
Route::get('/user/add', 'Admin\UserController@add_page')->name('user.add.page');
Route::post('/user/ins', 'Admin\UserController@u_ins')->name('user.ins');
Route::get('/users/active/{id}', 'Admin\UserController@active')->name('user.active');
Route::get('/users/inactive/{id}', 'Admin\UserController@inactive')->name('user.inactive');
Route::get('/users/edit/{id}', 'Admin\UserController@edit')->name('user.edit');
Route::post('/users/upd', 'Admin\UserController@upd')->name('user.upd');
});



Route::get('/image-upload', 'User\ImageController@index')->name('img.view');
Route::get('/image-upload/add', 'User\ImageController@add_page')->name('img.add.page');
Route::post('/image-upload/ins', 'User\ImageController@ins')->name('img.ins');
Route::get('/image-upload/view/{id}', 'User\ImageController@view')->name('img.view.list');
Route::get('/image-upload/dlt/{id}', 'User\ImageController@dlt')->name('img.dlt');



});