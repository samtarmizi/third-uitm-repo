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
Route::get('/blogs/show/{blog}', 'BlogController@show')->name('blog:show');
Route::get('/blogs', 'BlogController@index')->name('blog:index');
Route::group([
    'middleware' =>'auth',
    'prefix' => 'blog',
    'as' => 'blog:'
], function(){
    Route::get('/create', 'BlogController@create')->name('create');
    Route::post('/create', 'BlogController@store')->name('store');      

    Route::get('/edit/{blog}', 'BlogController@edit')->name('edit');
    Route::post('/edit/{blog}', 'BlogController@update')->name('update');
    Route::get('/delete/{blog}', 'BlogController@delete')->name('delete');
});