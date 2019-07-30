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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home1', 'HomeController@funds1')->name('home1')->middleware('auth');
Route::get('/home2', 'HomeController@enrollment')->name('home2')->middleware('auth');
Route::get('/home3', 'HomeController@wellwishers')->name('home3')->middleware('auth');
Route::resource('donor','HomeController');



Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::resource('agent','AgentsController');
<<<<<<< HEAD
	Route::resource('district','DistrictsController');
	Route::resource('Hierachy','HierachyController');

=======
    Route::resource('district','DistrictsController');
    Route::resource('rec','recommendcontroller');
    Route::resource('pay','PaymentController');
>>>>>>> 0dbb97b642c50f8d1aac5b254a3485af3a4366cb
});

 Route::get('/recommend','AgentsController@recommender');
 Route::get('/amount','PaymentController@amount');
 Route::get('/payment','PaymentController@payment');
 Route::get('delete/{id}','recommendcontroller@destroy');



