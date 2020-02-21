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

/**
 * Rotas do Site
 */
Route::group(['namespace' => 'Site'], function ()
{
	// Home
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('home', 'HomeController@index');
	// About
	Route::get('about', 'AboutController@index')->name('about');
	// Contact
	Route::get('contact', 'ContactController@index')->name('contact');
	Route::post('contact', 'ContactController@send')->name('contact');
	// Route::get('email-company', 'ContactController@testCompany');
	// Route::get('email-customer', 'ContactController@testCustomer');
});
