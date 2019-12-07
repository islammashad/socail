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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('auth.guest');
    });
});

Auth::routes();

/**s
 * Feed
 */
Route::get('/home', 'HomeController@index');

/**
 * Posts
 */
Route::post('/posts', 'PostController@store');

Route::delete('/posts/{post}', 'PostController@destroy');

Route::get('/search',[
	'uses' =>'SearchController@getResults',
	'as'   =>'search.results',
	]);


/**
 * Follows
 */
Route::post('/follows/{user}', 'FollowController@follow');

Route::delete('/follows/{user}', 'FollowController@unfollow');

Route::get('/{user}/followers', 'FollowController@followers');

Route::get('/{user}/followees', 'FollowController@followees');


/**
 * Comments
 */

 Route::post('/posts/{post}/store', 'CommentController@store');

/**
 * Likes
 */
Route::get('/posts/{post}/like', 'LikeController@likePost');

/**
 * Tags
 */
Route::get('/tags/{tag}', 'TagController@show');

/**
 * Messages
 */
Route::get('/inbox', 'MessageController@inbox');

Route::get('/outbox', 'MessageController@outbox');

Route::post('/messages', 'MessageController@store');

/**
 * Profile
 */
Route::get('/profile', 'ProfileController@profile');

Route::get('/{user}', 'ProfileController@show');
Route::post('/profile', 'ProfileController@updateAvatar');

Route::post('/profile/{id}/edit','ProfileController@edit');
