<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {
    Route::get('/tweets', 'TweetController@index')->name('home')->multiformat();

    Route::post('/tweets', 'TweetController@store');

    Route::get('/tweets/{tweet}/like', 'TweetLikesController@isLikedBy');

    Route::get('/tweets/{tweet}/dislike', 'TweetLikesController@isdislike');

    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');

    Route::Delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');

    Route::post('/profiles/{user:username}/follow', 'FollowController@store')->name('follow');

    Route::get('/profiles/{user:username}', 'ProfileController@show')->name('profile');

    Route::get('/profiles/{user:username}/edit', 'ProfileController@edit')->name('edit-profile');

    Route::patch('/profiles/{user:username}', 'ProfileController@update')->middleware('can:edit,user');

    Route::get('/explore', 'ExploreController@index');
});


