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

Route::get('/', 'App\Http\Controllers\TemplateController@index');
Route::get('/about', 'App\Http\Controllers\TemplateController@about');
Route::get('/news', 'App\Http\Controllers\NewsController@index');
Route::get('/blogs', 'App\Http\Controllers\BlogsController@index');
Route::get('/news/{id}', 'App\Http\Controllers\NewsController@detailnews')->name('detailnews.show');
Route::get('/blogs/{id}', 'App\Http\Controllers\BlogsController@detailblog')->name('detailblog.show');
Route::get('/searchresults', 'App\Http\Controllers\SearchController@index');
Route::get('/searchresultsb', 'App\Http\Controllers\SearchController@index2');
Route::get('/subscribe', 'App\Http\Controllers\SubscribeController@index');
//contact
Route::post('/sendmail', 'App\Http\Controllers\ContactController@sendMail')->name('contact.send');

//email
Route::get('/email', 'EmailController@create');
Route::post('/email', 'EmailController@sendEmail')->name('send.email');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
