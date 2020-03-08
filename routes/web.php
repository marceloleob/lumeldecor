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
	// Toggle Status
	Route::post('toggle-status', 'ToggleController@status');
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
	Route::get('painel', 'DashboardController@index')->name('dashboard');
	// Materials
	Route::get('materiais', 'MaterialController@index')->name('materials');
	Route::post('materiais', 'MaterialController@index')->name('materials-search');
	Route::get('cadastrar-material', 'MaterialController@create')->name('material-form');
	Route::post('cadastrar-material', 'MaterialController@store')->name('material-store');
	Route::get('editar-material/{id}/{page}', 'MaterialController@edit')->name('material-edit');
	// Categories
	Route::get('categorias', 'CategoryController@index')->name('categories');
	Route::post('categorias', 'CategoryController@index')->name('categories-search');
	Route::get('cadastrar-categoria', 'CategoryController@create')->name('category-form');
	Route::post('cadastrar-categoria', 'CategoryController@store')->name('category-store');
	Route::get('editar-categoria/{id}/{page}', 'CategoryController@edit')->name('category-edit');
	// Themes
	Route::get('temas', 'ThemeController@index')->name('themes');
	Route::post('temas', 'ThemeController@index')->name('themes-search');
	Route::get('cadastrar-tema', 'ThemeController@create')->name('theme-form');
	Route::post('cadastrar-tema', 'ThemeController@store')->name('theme-store');
	Route::get('editar-tema/{id}/{page}', 'ThemeController@edit')->name('theme-edit');
	// Colors
	Route::get('cores', 'ColorController@index')->name('colors');
	Route::post('cores', 'ColorController@index')->name('colors-search');
	Route::get('cadastrar-cor', 'ColorController@create')->name('color-form');
	Route::post('cadastrar-cor', 'ColorController@store')->name('color-store');
	Route::get('editar-cor/{id}/{page}', 'ColorController@edit')->name('color-edit');
	// Products
	Route::get('produtos', 'ProductController@index')->name('products');
	Route::post('produtos', 'ProductController@index')->name('products-search');
	Route::get('cadastrar-produto', 'ProductController@create')->name('product-form');
	Route::post('cadastrar-produto', 'ProductController@store')->name('product-store');
	Route::get('editar-produto/{id}/{page}', 'ProductController@edit')->name('product-edit');


	// Offer Coupons
	Route::get('cupons', 'OfferCouponController@index')->name('coupons');
	Route::post('cupons', 'OfferCouponController@index')->name('coupons-search');
	Route::get('cadastrar-cupom', 'OfferCouponController@create')->name('coupon-form');
	Route::post('cadastrar-cupom', 'OfferCouponController@store')->name('coupon-store');
	Route::get('editar-cupom/{id}/{page}', 'OfferCouponController@edit')->name('coupon-edit');
	// Offer Promotions
	Route::get('promocoes', 'OfferPromotionController@index')->name('promotions');
	Route::post('promocoes', 'OfferPromotionController@index')->name('promotions-search');
	Route::get('cadastrar-promocao', 'OfferPromotionController@create')->name('promotion-form');
	Route::post('cadastrar-promocao', 'OfferPromotionController@store')->name('promotion-store');
	Route::get('editar-promocao/{id}/{page}', 'OfferPromotionController@edit')->name('promotion-edit');
	// Orders
	Route::get('encomendas', 'OrderController@index')->name('orders');
	// Stocks
	Route::get('estoques', 'StockController@index')->name('stocks');
	// Posts
	Route::get('mensagens', 'PostController@index')->name('posts');

	// Customers
	Route::get('clientes', 'CustomerController@index')->name('customers');
	Route::post('clientes', 'CustomerController@index')->name('customers-search');
	Route::get('cadastrar-cliente', 'CustomerController@create')->name('customer-form');
	Route::post('cadastrar-cliente', 'CustomerController@store')->name('customer-store');
	Route::get('editar-cliente/{id}/{page}', 'CustomerController@edit')->name('customer-edit');
	// Suppliers
	Route::get('fornecedores', 'SupplierController@index')->name('suppliers');
	Route::post('fornecedores', 'SupplierController@index')->name('suppliers-search');
	Route::get('cadastrar-fornecedor', 'SupplierController@create')->name('supplier-form');
	Route::post('cadastrar-fornecedor', 'SupplierController@store')->name('supplier-store');
	Route::get('editar-fornecedor/{id}/{page}', 'SupplierController@edit')->name('supplier-edit');
	// Users
	Route::get('usuarios', 'UserController@index')->name('users');
	Route::post('usuarios', 'UserController@index')->name('users-search');
	Route::get('cadastrar-usuario', 'UserController@create')->name('user-form');
	Route::post('cadastrar-usuario', 'UserController@store')->name('user-store');
	Route::get('editar-usuario/{id}/{page}', 'UserController@edit')->name('user-edit');

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
