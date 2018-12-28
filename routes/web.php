<?php

use Spatie\Sitemap\SitemapGenerator;
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
Route::get('/', 'RoomController@index',function () {
    return view('welcome');
});


Auth::routes();

Route::get('/changePassword','UserController@showChangePasswordForm');
Route::post('/changePassword','UserController@changePassword')->name('changePassword');
Route::get('/news', 'PostController@index')->name('news');
Route::resource('/post', 'PostController');

Route::resource('/rooms', 'RoomController');
Route::get('/rooms.{room}', 'RoomController@show')->name('show');
Route::get('/h', 'RoomController@adminOnlyHiden')->name('adminonlyhiden');
Route::get('/v', 'RoomController@adminToGuest')->name('admintoguest');

Route::resource('companies', 'CompanyController');
Route::resource('share', 'ShareController');
Route::get('getJson', 'ShareController@getJson')->name('getJson');
Route::resource('users', 'UserController');

Route::post('search/filter','SearchController@searchFilter')/*->name('filter')*/;
Route::get('search/filter','SearchController@searchFilter');
Route::get('search','SearchController@index')->name('search');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('admin/{user}', ['as' => 'admin.activate', 'uses' => 'AdminUserController@activate']);
Route::get('sitemap', 'AdminUserController@siteMap');
Route::resource('admin','AdminUserController');

Route::resource('about','AboutController');
Route::resource('notation','NotationController');

Route::name('language')->get('language/{lang}', 'LangueController@language');

Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);
Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);


