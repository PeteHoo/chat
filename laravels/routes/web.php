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

Route::resource('archive', 'News\NewsController',['except'=>['create','edit']]);
Route::get('/contact', function () {
    return view('contact');
});

Route::resource('comment', 'CommentController');

Route::get('contact_submit', 'ContactController@create');

Route::get('single','News\NewsController@newsDetail');

Route::get('bloghome', 'BlogHomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', 'TestController@test');


