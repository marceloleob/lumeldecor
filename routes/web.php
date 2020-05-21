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


// /**
//  * Rotas AJAX
//  */
// Route::group(['namespace' => 'Ajax', 'middleware' => 'auth', 'prefix' => 'ajax'], function () {
// 	// Combo que carrega as Categorias de um Material
// 	Route::post('options/category', 'AjaxController@optionsCategory');
// });


/**
 * Rotas protegidas do Admin
 */
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
	// Home
	Route::get('/', 'DashboardController@index')->name('dashboard');
	// Materials
	Route::get('material/listar', 'MaterialController@index')->name('material.list');
	Route::any('material/buscar', 'MaterialController@index')->name('material.search');
	Route::get('material/cadastrar', 'MaterialController@create')->name('material.create');
	Route::post('material/salvar', 'MaterialController@store')->name('material.store');
	Route::get('material/editar/{id}', 'MaterialController@edit')->name('material.edit');
	Route::put('material/atualizar/{id}', 'MaterialController@update')->name('material.update');
	Route::get('material/status/{id}', 'MaterialController@changeStatus')->name('material.status');
	// Categories
	Route::get('categoria/lista', 'CategoryController@index')->name('category.list');
	Route::post('categoria/busca', 'CategoryController@index')->name('category.search');
	Route::get('categoria/nova', 'CategoryController@create')->name('category.form');
	Route::post('categoria/salvar', 'CategoryController@store')->name('category.store');
	Route::get('categoria/editar/{id}/{page}', 'CategoryController@edit')->name('category.edit');
	Route::get('categoria/status/{id}', 'CategoryController@toggleStatus')->name('category.toggle');
	Route::post('options/category', 'CategoryController@options');
	Route::get('teste', 'CategoryController@teste');
	Route::get('teste/find/{category}', 'CategoryController@testeFind');
	Route::get('teste/update/{category}', 'CategoryController@testeUpdate');
	// Themes
	Route::get('tema/lista', 'ThemeController@index')->name('theme.list');
	Route::any('tema/busca', 'ThemeController@index')->name('theme.search');
	Route::get('tema/novo', 'ThemeController@create')->name('theme.form');
	Route::post('tema/salvar', 'ThemeController@store')->name('theme.store');
	Route::get('tema/editar/{id}/{page}', 'ThemeController@edit')->name('theme.edit');
	Route::get('tema/status/{id}', 'ThemeController@toggleStatus')->name('theme.toggle');
	// Colors
	Route::get('cor/lista', 'ColorController@index')->name('color.list');
	Route::any('cor/busca', 'ColorController@index')->name('color.search');
	Route::get('cor/nova', 'ColorController@create')->name('color.form');
	Route::post('cor/salvar', 'ColorController@store')->name('color.store');
	Route::get('cor/editar/{id}/{page}', 'ColorController@edit')->name('color.edit');
	Route::get('cor/status/{id}', 'ColorController@toggleStatus')->name('color.toggle');
	// Item
	Route::get('item/lista', 'ItemController@index')->name('item.list');
	Route::any('item/busca', 'ItemController@index')->name('item.search');
	Route::get('item/novo', 'ItemController@create')->name('item.form');
	Route::post('item/salvar', 'ItemController@store')->name('item.store');
	Route::get('item/editar/{id}/{page}', 'ItemController@edit')->name('item.edit');
	Route::get('item/status/{id}', 'ItemController@toggleStatus')->name('item.toggle');
	// Products
	Route::get('produto/lista', 'ProductController@index')->name('product.list');
	Route::any('produto/busca', 'ProductController@index')->name('product.search');
	Route::get('produto/novo/{item?}', 'ProductController@create')->name('product.form');
	Route::post('produto/salvar', 'ProductController@store')->name('product.store');
	Route::get('produto/editar/{id}/{page}', 'ProductController@edit')->name('product.edit');
	Route::get('produto/status/{id}', 'ProductController@toggleStatus')->name('product.toggle');












	// Campaign
	Route::get('campanha/lista', 'CampaignController@index')->name('campaign.list');
	Route::any('campanha/busca', 'CampaignController@index')->name('campaign.search');
	Route::get('campanha/novo', 'CampaignController@create')->name('campaign.form');
	Route::post('campanha/salvar', 'CampaignController@store')->name('campaign.store');
	Route::get('campanha/editar/{id}/{page}', 'CampaignController@edit')->name('campaign.edit');
	Route::get('campanha/status/{id}', 'CampaignController@toggleStatus')->name('campaign.toggle');

	// Offer Coupons
	Route::get('cupom/lista', 'OfferCouponController@index')->name('coupon.list');
	Route::any('cupom/busca', 'OfferCouponController@index')->name('coupon.search');
	Route::get('cupom/novo', 'OfferCouponController@create')->name('coupon.form');
	Route::post('cupom/salvar', 'OfferCouponController@store')->name('coupon.store');
	Route::get('cupom/editar/{id}/{page}', 'OfferCouponController@edit')->name('coupon.edit');
	Route::get('cupom/status/{id}', 'OfferCouponController@toggleStatus')->name('coupon.toggle');
	// Offer Promotions
	Route::get('promocao/lista', 'OfferPromotionController@index')->name('promotion.list');
	Route::any('promocao/busca', 'OfferPromotionController@index')->name('promotion.search');
	Route::get('promocao/nova', 'OfferPromotionController@create')->name('promotion.form');
	Route::post('promocao/salvar', 'OfferPromotionController@store')->name('promotion.store');
	Route::get('promocao/editar/{id}/{page}', 'OfferPromotionController@edit')->name('promotion.edit');
	Route::get('promocao/status/{id}', 'OfferPromotionController@toggleStatus')->name('promotion.toggle');
	// Orders
	Route::get('encomenda/lista', 'OrderController@index')->name('order.list');
	Route::any('encomenda/busca', 'OrderController@index')->name('order.search');
	Route::get('encomenda/nova', 'OrderController@index')->name('order.form');
	Route::post('encomenda/salvar', 'OrderController@store')->name('order.store');
	Route::get('encomenda/editar/{id}/{page}', 'OrderController@edit')->name('order.edit');
	Route::get('encomenda/status/{id}', 'OrderController@toggleStatus')->name('order.toggle');
	// Stocks
	Route::get('estoque/lista', 'StockController@index')->name('stock.list');
	Route::any('estoque/busca', 'StockController@index')->name('stock.search');
	Route::get('estoque/novo', 'StockController@index')->name('stock.form');
	Route::post('estoque/salvar', 'StockController@store')->name('stock.store');
	Route::get('estoque/editar/{id}/{page}', 'StockController@edit')->name('stock.edit');
	Route::get('estoque/status/{id}', 'StockController@toggleStatus')->name('stock.toggle');
	// Contact Message
	Route::get('mensagem/lista', 'ContactMessageController@index')->name('message.list');
	Route::get('mensagem/{id}/{page}', 'ContactMessageController@view')->name('message.view');
	Route::post('mensagem/nao-lida', 'ContactMessageController@read')->name('message.read');
	// Customers
	Route::get('cliente/lista', 'CustomerController@index')->name('customer.list');
	Route::any('cliente/busca', 'CustomerController@index')->name('customer.search');
	Route::get('cliente/novo', 'CustomerController@create')->name('customer.form');
	Route::post('cliente/salvar', 'CustomerController@store')->name('customer.store');
	Route::get('cliente/editar/{id}/{page}', 'CustomerController@edit')->name('customer.edit');
	Route::get('cliente/status/{id}', 'CustomerController@toggleStatus')->name('customer.toggle');
	// Suppliers
	Route::get('fornecedor/lista', 'SupplierController@index')->name('supplier.list');
	Route::any('fornecedor/busca', 'SupplierController@index')->name('supplier.search');
	Route::get('fornecedor/novo', 'SupplierController@create')->name('supplier.form');
	Route::post('fornecedor/salvar', 'SupplierController@store')->name('supplier.store');
	Route::get('fornecedor/editar/{id}/{page}', 'SupplierController@edit')->name('supplier.edit');
	Route::get('fornecedor/status/{id}', 'SupplierController@toggleStatus')->name('supplier.toggle');
	// Users
	Route::get('usuario/lista', 'UserController@index')->name('user.list');
	Route::any('usuario/busca', 'UserController@index')->name('user.search');
	Route::get('usuario/novo', 'UserController@create')->name('user.form');
	Route::post('usuario/salvar', 'UserController@store')->name('user.store');
	Route::get('usuario/editar/{id}/{page}', 'UserController@edit')->name('user.edit');
	Route::get('usuario/status/{id}', 'UserController@toggleStatus')->name('user.toggle');
	// Profile
	Route::get('meus-dados', 'UserController@index')->name('profile');
});


/**
 * Rotas de Autenticacao
 */
Auth::routes(['register' => false]);
