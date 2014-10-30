<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

	# Event Listen
	//Event::listen('Acme.Blogs.Events.BlogPublished', 'EmailNotifier@whenblogisPublished');  // this is just an
	Event::listen('Acme.*', 'Acme\Listeners\EmailNotifier');

	# Home
	Route::get('/', ['as'   => 'home',
	                 'uses' => 'BlogsController@index']);


	// Auth filerting Route
	Route::filter('auth', function ()
	{
		if(Auth::guest())
		{
			return Redirect::guest('login');
		}
	});

	# Blogs

	Route::when('blogs/store', 'logged', array('post','put','store','delete'));

	Route::post ('blogs/store',['as' => 'blogs.store','uses' => 'BlogsController@store'] );

	Route::get ('blogs',['as' => 'blog','uses' => 'BlogsController@index'] );
	Route::get ('blogs/{id}',['as' => 'blog.show','uses' => 'BlogsController@show'] );


//	# Registration
//	Route::resource('registration','RegistrationController');
//	Route::get('/register','RegistrationController@create');
//
//	# Authentication
//	Route::get('login',['as'=>'login','uses' => 'SessionsController@create']);
//	Route::get('logout',['as'=>'logout','uses'=>'SessionsController@destroy']);
//
//	Route::resource('sessions','SessionsController');
//
//	# status Routes
//   Route::get('statuses',['as'=>'statuses_path',
//									'uses'=>'StatusesController@index']);
//	Route::post('statuses',['as'=>'statuses_path',
//									'uses'=>'StatusesController@store']);
//
//	# Users
//	Route::get('users',['as' =>'users','uses' => 'UsersController@index']);
//  # Showing user profile
//	Route::get('@{email}',[
//						 'as'=>'profile_path',
//					 	'uses' => 'UsersController@show'
//						 ]);
//	
	# Commnets 
	Route::post('blogs/{id}/comments', ['as'   => 'comment_path',
									 'uses' => 'CommentsController@store']);

	
	# Using Auth lib  For #--dashboard--#
  Route::group(['before' => ['logged', 'can_see']], function ()
  {
	  Route::get('/admin/blogs/dashboard', ['as'   => 'blogs.list',
														 'uses' => 'BlogsdashboardController@base']);
	  Route::get('/admin/blogs/dashboard/settings', ['as'   => 'blog.settings',
														 'uses' => 'BlogssettingsController@index']);
	  Route::post('/admin/blogs/dashboard/settings/edit', ['as'   => 'postEditSettings',
														 'uses' => 'BlogssettingsController@postEditSettings']);
  });	  

