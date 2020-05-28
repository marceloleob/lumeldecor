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
	Route::put('material/atualizar/{id}', 'MaterialController@store')->name('material.update');
	Route::get('material/status/{id}', 'MaterialController@changeStatus')->name('material.status');
	// Categories
	Route::get('categoria/listar', 'CategoryController@index')->name('category.list');
	Route::any('categoria/buscar', 'CategoryController@index')->name('category.search');
	Route::get('categoria/cadastrar', 'CategoryController@create')->name('category.create');
	Route::post('categoria/salvar', 'CategoryController@store')->name('category.store');
	Route::get('categoria/editar/{id}', 'CategoryController@edit')->name('category.edit');
	Route::put('categoria/atualizar/{id}', 'CategoryController@store')->name('category.update');
	Route::get('categoria/status/{id}', 'CategoryController@changeStatus')->name('category.status');
	Route::post('category/options', 'CategoryController@options');
	// Themes
	Route::get('tema/listar', 'ThemeController@index')->name('theme.list');
	Route::any('tema/buscar', 'ThemeController@index')->name('theme.search');
	Route::get('tema/cadastrar', 'ThemeController@create')->name('theme.create');
	Route::post('tema/salvar', 'ThemeController@store')->name('theme.store');
	Route::get('tema/editar/{id}', 'ThemeController@edit')->name('theme.edit');
	Route::put('tema/atualizar/{id}', 'ThemeController@store')->name('theme.update');
	Route::get('tema/status/{id}', 'ThemeController@changeStatus')->name('theme.status');
	// Colors
	Route::get('cor/listar', 'ColorController@index')->name('color.list');
	Route::any('cor/buscar', 'ColorController@index')->name('color.search');
	Route::get('cor/cadastrar', 'ColorController@create')->name('color.create');
	Route::post('cor/salvar', 'ColorController@store')->name('color.store');
	Route::get('cor/editar/{id}', 'ColorController@edit')->name('color.edit');
	Route::put('cor/atualizar/{id}', 'ColorController@store')->name('color.update');
	Route::get('cor/status/{id}', 'ColorController@changeStatus')->name('color.status');


		// Item
		Route::get('item/lista', 'ItemController@index')->name('item.list');
		Route::any('item/busca', 'ItemController@index')->name('item.search');
		Route::get('item/novo', 'ItemController@create')->name('item.create');
		Route::post('item/salvar', 'ItemController@store')->name('item.store');
		Route::get('item/editar/{id}/{page}', 'ItemController@edit')->name('item.edit');
		Route::get('item/status/{id}', 'ItemController@changeStatus')->name('item.status');
	// Products
	Route::get('produto/listar', 'ProductController@index')->name('product.list');
	Route::any('produto/buscar', 'ProductController@index')->name('product.search');
	Route::get('produto/cadastrar', 'ProductController@create')->name('product.create');
	Route::post('produto/salvar', 'ProductController@store')->name('product.store');
	Route::get('produto/editar/{id}', 'ProductController@edit')->name('product.edit');
	Route::put('produto/atualizar/{id}', 'ProductController@update')->name('product.update');
	Route::get('produto/status/{id}', 'ProductController@changeStatus')->name('product.status');


	// Campaign
	Route::get('campanha/listar', 'CampaignController@index')->name('campaign.list');
	Route::any('campanha/buscar', 'CampaignController@index')->name('campaign.search');
	Route::get('campanha/cadastrar', 'CampaignController@create')->name('campaign.create');
	Route::post('campanha/salvar', 'CampaignController@store')->name('campaign.store');
	Route::get('campanha/editar/{id}', 'CampaignController@edit')->name('campaign.edit');
	Route::put('campanha/atualizar/{id}', 'CampaignController@store')->name('campaign.update');
	Route::get('campanha/status/{id}', 'CampaignController@changeStatus')->name('campaign.status');
	// Offer Coupons
	Route::get('cupom/listar', 'OfferCouponController@index')->name('coupon.list');
	Route::any('cupom/buscar', 'OfferCouponController@index')->name('coupon.search');
	Route::get('cupom/cadastrar', 'OfferCouponController@create')->name('coupon.create');
	Route::post('cupom/salvar', 'OfferCouponController@store')->name('coupon.store');
	Route::get('cupom/editar/{id}', 'OfferCouponController@edit')->name('coupon.edit');
	Route::put('cupom/atualizar/{id}', 'OfferCouponController@store')->name('coupon.update');
	Route::get('cupom/status/{id}', 'OfferCouponController@changeStatus')->name('coupon.status');
	// Offer Promotions
	Route::get('promocao/listar', 'OfferPromotionController@index')->name('promotion.list');
	Route::any('promocao/buscar', 'OfferPromotionController@index')->name('promotion.search');
	Route::get('promocao/cadastrar', 'OfferPromotionController@create')->name('promotion.create');
	Route::post('promocao/salvar', 'OfferPromotionController@store')->name('promotion.store');
	Route::get('promocao/editar/{id}', 'OfferPromotionController@edit')->name('promotion.edit');
	Route::put('promocao/atualizar/{id}', 'OfferPromotionController@store')->name('promotion.update');
	Route::get('promocao/status/{id}', 'OfferPromotionController@changeStatus')->name('promotion.status');


		// Orders
		Route::get('encomenda/lista', 'OrderController@index')->name('order.list');
		Route::any('encomenda/busca', 'OrderController@index')->name('order.search');
		Route::get('encomenda/nova', 'OrderController@index')->name('order.create');
		Route::post('encomenda/salvar', 'OrderController@store')->name('order.store');
		Route::get('encomenda/editar/{id}/{page}', 'OrderController@edit')->name('order.edit');
		Route::get('encomenda/status/{id}', 'OrderController@changeStatus')->name('order.status');
		// Stocks
		Route::get('estoque/lista', 'StockController@index')->name('stock.list');
		Route::any('estoque/busca', 'StockController@index')->name('stock.search');
		Route::get('estoque/novo', 'StockController@index')->name('stock.create');
		Route::post('estoque/salvar', 'StockController@store')->name('stock.store');
		Route::get('estoque/editar/{id}/{page}', 'StockController@edit')->name('stock.edit');
		Route::get('estoque/status/{id}', 'StockController@changeStatus')->name('stock.status');
		// Contact Message
		Route::get('mensagem/lista', 'ContactMessageController@index')->name('message.list');
		Route::get('mensagem/{id}/{page}', 'ContactMessageController@view')->name('message.view');
		Route::post('mensagem/nao-lida', 'ContactMessageController@read')->name('message.read');


	// Customers
	Route::get('cliente/listar', 'CustomerController@index')->name('customer.list');
	Route::any('cliente/buscar', 'CustomerController@index')->name('customer.search');
	Route::get('cliente/cadastrar', 'CustomerController@create')->name('customer.create');
	Route::post('cliente/salvar', 'CustomerController@store')->name('customer.store');
	Route::get('cliente/editar/{id}', 'CustomerController@edit')->name('customer.edit');
	Route::put('cliente/atualizar/{id}', 'CustomerController@store')->name('customer.update');
	Route::get('cliente/status/{id}', 'CustomerController@changeStatus')->name('customer.status');
	// Suppliers
	Route::get('fornecedor/listar', 'SupplierController@index')->name('supplier.list');
	Route::any('fornecedor/buscar', 'SupplierController@index')->name('supplier.search');
	Route::get('fornecedor/cadastrar', 'SupplierController@create')->name('supplier.create');
	Route::post('fornecedor/salvar', 'SupplierController@store')->name('supplier.store');
	Route::get('fornecedor/editar/{id}', 'SupplierController@edit')->name('supplier.edit');
	Route::put('fornecedor/atualizar/{id}', 'SupplierController@store')->name('supplier.update');
	Route::get('fornecedor/status/{id}', 'SupplierController@changeStatus')->name('supplier.status');
	// Employee
	Route::get('funcionario/listar', 'EmployeeController@index')->name('employee.list');
	Route::any('funcionario/buscar', 'EmployeeController@index')->name('employee.search');
	Route::get('funcionario/cadastrar', 'EmployeeController@create')->name('employee.create');
	Route::post('funcionario/salvar', 'EmployeeController@store')->name('employee.store');
	Route::get('funcionario/editar/{id}', 'EmployeeController@edit')->name('employee.edit');
	Route::put('funcionario/atualizar/{id}', 'EmployeeController@store')->name('employee.update');
	Route::get('funcionario/status/{id}', 'EmployeeController@changeStatus')->name('employee.status');
	// Users
	Route::get('usuario/listar', 'UserController@index')->name('user.list');
	Route::any('usuario/buscar', 'UserController@index')->name('user.search');
	// Route::get('usuario/cadastrar', 'UserController@create')->name('user.create');
	// Route::post('usuario/salvar', 'UserController@store')->name('user.store');
	Route::get('usuario/editar/{id}', 'UserController@edit')->name('user.edit');
	Route::put('usuario/atualizar/{id}', 'UserController@store')->name('user.update');
	Route::get('usuario/status/{id}', 'UserController@changeStatus')->name('user.status');
	// Profile
	Route::get('meus-dados', 'UserController@index')->name('profile');
});


/**
 * Rotas de Autenticacao
 */
Auth::routes(['register' => false]);
