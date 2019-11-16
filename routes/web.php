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

Route::get('/testing', function () {
    echo 'This is Testing';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blogs', 'BlogController@index')->name('blog:index');
Route::get('/blogs/create', 'BlogController@create')->name('blog:create');
Route::post('/blogs/create', 'BlogController@store')->name('blog:store');      
Route::get('/blogs/show/{blog}', 'BlogController@show')->name('blog:show');
Route::get('/blogs/edit/{blog}', 'BlogController@edit')->name('blog:edit');
Route::post('/blogs/edit/{blog}', 'BlogController@update')->name('blog:update');
Route::get('/blogs/delete/{blog}', 'BlogController@delete')->name('blog:delete');