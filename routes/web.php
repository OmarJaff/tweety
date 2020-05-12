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

    Route::get('/tweets', 'TweetController@index')->name('home');

    Route::get('/tweets/tweetdata', 'TweetController@tweetdata');

    Route::post('/tweets', 'TweetController@store');

    Route::get('/tweets/{tweet}/like', 'TweetLikesController@isLikedBy');

    Route::patch('/tweets/{tweet}/update', 'TweetController@update');

    Route::delete('/tweets/{tweet}/delete', 'TweetController@destory');

    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');

    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');

    Route::post('/profiles/{user:username}/follow', 'FollowController@store')->name('follow');

    Route::get('/profiles/{user:username}/follow', 'FollowController@isFollowing');

    Route::get('/profiles/{user:username}', 'ProfileController@show')->name('profile');

    Route::get('/profiles/{user:username}/edit', 'ProfileController@edit')->name('edit-profile');

    Route::get('/bio/{user:username}', 'BioController@show');

    Route::patch('/bio/{user:username}/edit', 'BioController@update')->middleware('can:edit,user');

    Route::delete('/bio/{user:username}/delete', 'BioController@destroy')->middleware('can:delete,user');

    Route::patch('/profiles/{user:username}', 'ProfileController@update')->middleware('can:edit,user');


    Route::delete('/replies/{reply}', 'ReplyController@destroy');

    Route::post('/replies/{tweet}', 'ReplyController@store');

    Route::get('/explore', 'ExploreController@index');

    Route::get('/friends', 'FriendsController@show');

    Route::get('/tweets/{tweet}', 'ReplyController@show');

});


