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

Route::get('/', [

	'uses' => 'ForumsController@index',
	'as' => 'forum'

]);
Route::get('welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/forum', [

	'uses' => 'ForumsController@index',
	'as' => 'forum'

]);

Route::get('channel/{slug}', [
	'uses' => 'ForumsController@channel',
	'as' => 'channel'
]);

// OAuth Routes

Route::get('login/github', [
    'uses' => 'Auth\LoginController@redirectToProvider',
    'as' => 'login.github'
]);
    
Route::get('login/github/callback', [
    'uses' => 'Auth\LoginController@handleProviderCallback',
    'as' => 'login.github.callback'
]);

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


Route::group(['middleware' => 'auth'], function(){
	Route::resource('channels', 'ChannelsController');

	Route::get('discussion/create', [
		'uses' => 'DiscussionsController@create',
		'as' => 'discussion.create'
	]);

	Route::post('discussions/store', [
		'uses' => 'DiscussionsController@store',
		'as' => 'discussions.store'
	]);

	Route::post('discussion/reply/{id}', [
		'uses' => 'DiscussionsController@reply',
		'as' => 'discussion.reply'
	]);

	Route::get('discussion/{slug}', [
	'uses' => 'DiscussionsController@show',
	'as' => 'discussion'
	]);

	Route::get('/reply/like/{id}', [
		'uses' => 'RepliesController@like',
		'as' => 'reply.like'
	]);

	Route::get('/reply/unlike/{id}', [
		'uses' => 'RepliesController@unlike',
		'as' => 'reply.unlike'
	]);

	Route::get('/discussion/watch/{id}', [
		'uses' => 'WatchersController@watch',
		'as' => 'discussion.watch'
	]);

	Route::get('/discussion/unwatch/{id}', [
		'uses' => 'WatchersController@unwatch',
		'as' => 'discussion.unwatch'
	]);

	Route::get('/discussion/best/reply/{id}', [
		'uses' => 'RepliesController@best_answer',
		'as' => 'discussion.best.answer'
	]);

	Route::get('/discussions/edit/{slug}',[

		'uses' => 'DiscussionsController@edit',

		'as' => 'discussions.edit'

	]);

	Route::post('/discussions/update/{id}',[

		'uses' => 'DiscussionsController@update',

		'as' => 'discussions.update'

	]);

	Route::get('/reply/edit/{id}',[

		'uses' => 'RepliesController@edit',

		'as' => 'reply.edit'

	]);

	Route::post('/reply/update/{id}',[

		'uses' => 'RepliesController@update',

		'as' => 'reply.update'

	]);

});

//**************Profiles Routes ****************************
Route::prefix('/profile')->middleware('auth')->group(function(){
    Route::get('/passwordChange','ProfileController@changePassword');
    Route::post('/passwordChange/{id}','ProfileController@postChangePassword');
    Route::get('/editProfile/{id}','ProfileController@editprofile');
    Route::post('/editprofile/{id}','ProfileController@posteditprofile');
});
