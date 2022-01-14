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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'post'], function() {
    Route::get('/', 'App\Http\Controllers\PostController@index')->name('post.index');
    Route::get('/add', 'App\Http\Controllers\PostController@add')->name('post.add');
    Route::post('/store', 'App\Http\Controllers\PostController@store')->name('post.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');
    Route::post('/{id}/update', 'App\Http\Controllers\PostController@update')->name('post.update');
    Route::get('/{id}/delete', 'App\Http\Controllers\PostController@delete')->name('post.delete');
});

Route::get('/post/{slug}', 'App\Http\Controllers\HomeController@postSlug');