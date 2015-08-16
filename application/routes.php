<?php
Route::get('test', function() {
  $painting = Painting::first();
  $tags = $painting->tags;
  dd($tags);
});

// Language
Route::get('language/(:any)', array('as' => 'language.set', 'uses' => 'language@set'));

// Feed
Route::get('feed', array('as' => 'feed.index', 'uses' => 'feed@index'));

// Home
Route::get('/', array('as' => 'home.index', 'uses' => 'home@index'));
Route::get('about', array('as' => 'home.about', 'uses' => 'home@about'));
Route::get('faq', array('as' => 'home.faq', 'uses' => 'home@faq'));
Route::get('contact', array('as' => 'home.contact', 'uses' => 'home@contact'));
Route::post('about/send', array('as' => 'home.about.send', 'uses' => 'home@send_message'));

// Work
Route::get('work/(:any?)', array('as' => 'work.index', 'uses' => 'work@index'));
Route::get('work/paintings/search', array('as' => 'work.search', 'uses' => 'work@paintings_search'));

// Events
Route::get('events', array('as' => 'events.index', 'uses' => 'events@index'));

// Tags
Route::get('tags', array('as' => 'tags.index', 'uses' => 'tags@index'));
Route::get('tags/(:any)', array('as' => 'tags.show', 'uses' => 'tags@show'));

// Session
Route::get('session/login', array('as' => 'session.login', 'uses' => 'session@login'));
Route::post('session/login', array('as' => 'session.login.check', 'uses' => 'session@login'));
Route::get('session/logout', array('as' => 'session.logout', 'uses' => 'session@logout'));
Route::get('session/reset', array('as' => 'session.reset', 'uses' => 'session@reset'));
Route::post('session/reset', array('as' => 'session.reset.check', 'uses' => 'session@reset'));
Route::get('session/confirmation/(:any)/(:any)', array('as' => 'session.confirmation', 'uses' => 'session@confirmation'));

// Dashboard
Route::get('dashboard', array('as' => 'dashboard.index', 'uses' => 'dashboard@profile'));
Route::get('dashboard/profile', array('as' => 'dashboard.profile', 'uses' => 'dashboard@profile'));
Route::post('dashboard/profile', array('as' => 'dashboard.profile.check', 'uses' => 'dashboard@profile'));
Route::post('dashboard/change_password', array('as' => 'dashboard.profile.change_password', 'uses' => 'dashboard@change_password'));
Route::get('dashboard/users', array('as' => 'dashboard.users', 'uses' => 'dashboard@users'));
Route::get('dashboard/users/new', array('as' => 'dashboard.users.new', 'uses' => 'dashboard@users_new'));
Route::post('dashboard/users/new', array('as' => 'dashboard.users.new.check', 'uses' => 'dashboard@users_new'));
Route::delete('dashboard/users/(:num)/delete', array('as' => 'dashboard.users.delete', 'uses' => 'dashboard@users_delete'));
Route::get('dashboard/users/search', array('as' => 'dashboard.users.search', 'uses' => 'dashboard@users_search'));
Route::get('dashboard/paintings', array('as' => 'dashboard.paintings', 'uses' => 'dashboard@paintings'));
Route::get('dashboard/paintings/new', array('as' => 'dashboard.paintings.new', 'uses' => 'dashboard@paintings_new'));
Route::post('dashboard/paintings/new', array('as' => 'dashboard.paintings.new.check', 'uses' => 'dashboard@paintings_new'));
Route::get('dashboard/paintings/(:num)/edit', array('as' => 'dashboard.paintings.edit', 'uses' => 'dashboard@paintings_edit'));
Route::put('dashboard/paintings/(:num)/edit', array('as' => 'dashboard.paintings.edit.check', 'uses' => 'dashboard@paintings_edit'));
Route::delete('dashboard/paintings/(:num)/delete', array('as' => 'dashboard.paintings.delete', 'uses' => 'dashboard@paintings_delete'));
Route::get('dashboard/paintings/search', array('as' => 'dashboard.paintings.search', 'uses' => 'dashboard@paintings_search'));
Route::get('dashboard/slideshow', array('as' => 'dashboard.slideshow', 'uses' => 'dashboard@slideshow'));
Route::post('dashboard/slideshow/(:num)', array('as' => 'dashboard.slideshow.check', 'uses' => 'dashboard@slideshow'));
Route::get('dashboard/events', array('as' => 'dashboard.events', 'uses' => 'dashboard@events'));
Route::get('dashboard/events/new', array('as' => 'dashboard.events.new', 'uses' => 'dashboard@events_new'));
Route::post('dashboard/events/new', array('as' => 'dashboard.events.new.check', 'uses' => 'dashboard@events_new'));
Route::get('dashboard/events/(:num)/edit', array('as' => 'dashboard.events.edit', 'uses' => 'dashboard@events_edit'));
Route::put('dashboard/events/(:num)/edit', array('as' => 'dashboard.events.edit.check', 'uses' => 'dashboard@events_edit'));
Route::delete('dashboard/events/(:num)/delete', array('as' => 'dashboard.events.delete', 'uses' => 'dashboard@events_delete'));
Route::get('dashboard/events/search', array('as' => 'dashboard.events.search', 'uses' => 'dashboard@events_search'));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function() {
	return Response::error('404');
});

Event::listen('500', function() {
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function() {
	// Do stuff before every request to your application...
});

Route::filter('after', function($response) {
	// Do stuff after every request to your application...
});

Route::filter('csrf', function() {
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function() {
  if (!Sentry::check()) {
		Session::put('pre_login_url', URL::current());

    return Redirect::to('session/login')
      ->with('status_error', 'You need to login first.');
  }
});

