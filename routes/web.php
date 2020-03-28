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
})->middleware('guest');




Route::get('/register', 'UserController@showRegister');
Route::post('/register', 'UserController@store');

Route::get('/login', 'UserController@showLogin');
Route::post('/login', 'UserController@doLogin')->name('login');

Route::get('/logout', 'UserController@doLogout');

Route::get('/api/summary', 'ApiController@showSummary');

Route::get('/web/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/web/forum', 'DashboardController@forum')->name('forum');

Route::get('/web/forum/thread/add', 'ThreadController@show')->name('addthread');
Route::post('/web/forum/thread/add', 'ThreadController@store')->name('addthread');
Route::get('/web/forum/thread/{id}', 'ThreadController@index')->name('thread');
Route::get('/web/forum/thread/edit/{id}', 'ThreadController@edit')->name('editthread');
Route::post('/web/forum/thread/edit/{id}', 'ThreadController@update')->name('editthread');
Route::get('/web/forum/thread/{id}/delete', 'ThreadController@destroy')->name('deletethread');

Route::post('/web/forum/thread/{id}/replies/add', 'RepliesController@store')->name('addreplies');
Route::get('/web/forum/thread/{id}/replies/delete/{rid}', 'RepliesController@destroy')->name('deletereplies');
