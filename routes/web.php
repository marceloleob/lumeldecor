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

/**
 * Rotas AJAX
 */
Route::group(['middleware' => 'auth', 'namespace' => 'Ajax', 'prefix' => 'ajax'], function ()
{
	// // Carrega combos AJAX
	// Route::post('combo-categorias', 'CategoryController@loadCombo');

	// // Validacoes AJAX
	// Route::post('check-email', 'AjaxController@checkEmail');
	// Route::post('check-cpf', 'AjaxController@checkCpf');
	// Route::post('check-url', 'AjaxController@checkUrl');
});

/**
 * Rotas protegidas do Admin
 */
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function ()
{
	// Home
	Route::get('/', 'DashboardController@index')->name('dashboard');


});

/**
 * Rotas de Autenticacao
 */
Auth::routes(
	[
		'register' => false,
	]
);
/*
Route::group(['namespace' => 'Auth'], function()
{
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'RegisterController@register');

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');

    Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
});
*/
