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

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['web']], function () {


    Route::get('blog/{slug}', ['as' => 'blog.single','uses'=>'BlogController@getSingle']);
    Route::get('contact', 'PagesController@getContact');
    Route::get('about', 'PagesController@getAbout');
    Route::get('/', 'PagesController@getIndex');
    Route::resource('posts', 'PostController');
});

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
