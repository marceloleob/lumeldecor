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
Route::group(['namespace' => 'Site'], function () {
	// Home
	Route::get('/', 'HomeController@index')->name('home');
});


/**
 * Rotas AJAX
 */
Route::group(['namespace' => 'Ajax', 'middleware' => 'auth', 'prefix' => 'ajax'], function () {

});


/**
 * Rotas protegidas do Admin
 */
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
	// Home
	Route::get('/', 'DashboardController@index')->name('dashboard');
	// Materials
	Route::get('materiais', 'MaterialController@index')->name('material.list');
	Route::any('materiais', 'MaterialController@index')->name('material.search');
	Route::get('cadastrar-material', 'MaterialController@create')->name('material.form');
	Route::post('salvar-material', 'MaterialController@store')->name('material.store');
	Route::get('editar-material/{id}/{page}', 'MaterialController@edit')->name('material.edit');
	Route::get('materiais/status/{id}', 'GalleryController@toggle')->name('material.toggle');
	// Categories
	Route::get('categorias', 'CategoryController@index')->name('category.list');
	Route::post('categorias', 'CategoryController@index')->name('category.search');
	Route::get('cadastrar-categoria', 'CategoryController@create')->name('category.form');
	Route::post('salvar-categoria', 'CategoryController@store')->name('category.store');
	Route::get('editar-categoria/{id}/{page}', 'CategoryController@edit')->name('category.edit');
	Route::get('categorias/status/{id}', 'CategoryController@toggle')->name('category.toggle');
	// Themes
	Route::get('temas', 'ThemeController@index')->name('theme.list');
	Route::any('temas', 'ThemeController@index')->name('theme.search');
	Route::get('cadastrar-tema', 'ThemeController@create')->name('theme.form');
	Route::post('salvar-tema', 'ThemeController@store')->name('theme.store');
	Route::get('editar-tema/{id}/{page}', 'ThemeController@edit')->name('theme.edit');
	// Colors
	Route::get('cores', 'ColorController@index')->name('color.list');
	Route::any('cores', 'ColorController@index')->name('color.search');
	Route::get('cadastrar-cor', 'ColorController@create')->name('color.form');
	Route::post('salvar-cor', 'ColorController@store')->name('color.store');
	Route::get('editar-cor/{id}/{page}', 'ColorController@edit')->name('color.edit');
	// Products
	Route::get('produtos', 'ProductController@index')->name('product.list');
	Route::any('produtos', 'ProductController@index')->name('product.search');
	Route::get('cadastrar-produto', 'ProductController@create')->name('product.form');
	Route::post('salvar-produto', 'ProductController@store')->name('product.store');
	Route::get('editar-produto/{id}/{page}', 'ProductController@edit')->name('product.edit');
	// Offer Coupons
	Route::get('cupons', 'OfferCouponController@index')->name('coupon.list');
	Route::any('cupons', 'OfferCouponController@index')->name('coupon.search');
	Route::get('cadastrar-cupom', 'OfferCouponController@create')->name('coupon.form');
	Route::post('salvar-cupom', 'OfferCouponController@store')->name('coupon.store');
	Route::get('editar-cupom/{id}/{page}', 'OfferCouponController@edit')->name('coupon.edit');
	// Offer Promotions
	Route::get('promocoes', 'OfferPromotionController@index')->name('promotion.list');
	Route::any('promocoes', 'OfferPromotionController@index')->name('promotion.search');
	Route::get('cadastrar-promocao', 'OfferPromotionController@create')->name('promotion.form');
	Route::post('salvar-promocao', 'OfferPromotionController@store')->name('promotion.store');
	Route::get('editar-promocao/{id}/{page}', 'OfferPromotionController@edit')->name('promotion.edit');
	// Orders
	Route::get('encomendas', 'OrderController@index')->name('order.list');
	// Stocks
	Route::get('estoques', 'StockController@index')->name('stock.list');
	// Posts
	Route::get('contatos', 'ContactController@index')->name('contact.list');
	// Customers
	Route::get('clientes', 'CustomerController@index')->name('customer.list');
	Route::any('clientes', 'CustomerController@index')->name('customer.search');
	Route::get('cadastrar-cliente', 'CustomerController@create')->name('customer.form');
	Route::post('salvar-cliente', 'CustomerController@store')->name('customer.store');
	Route::get('editar-cliente/{id}/{page}', 'CustomerController@edit')->name('customer.edit');
	// Suppliers
	Route::get('fornecedores', 'SupplierController@index')->name('supplier.list');
	Route::any('fornecedores', 'SupplierController@index')->name('supplier.search');
	Route::get('cadastrar-fornecedor', 'SupplierController@create')->name('supplier.form');
	Route::post('salvar-fornecedor', 'SupplierController@store')->name('supplier.store');
	Route::get('editar-fornecedor/{id}/{page}', 'SupplierController@edit')->name('supplier.edit');
	// Users
	Route::get('usuarios', 'UserController@index')->name('user.list');
	Route::any('usuarios', 'UserController@index')->name('user.search');
	Route::get('cadastrar-usuario', 'UserController@create')->name('user.form');
	Route::post('salvar-usuario', 'UserController@store')->name('user.store');
	Route::get('editar-usuario/{id}/{page}', 'UserController@edit')->name('user.edit');
	// Profile
	Route::get('meus-dados', 'UserController@index')->name('profile');
});


/**
 * Rotas de Autenticacao
 */
// Auth::routes(['register' => false]);
