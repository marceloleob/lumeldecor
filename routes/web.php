<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\FaqController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ShippingController;
use App\Http\Controllers\Site\ShopCartController;
use App\Http\Controllers\Site\TermsController;
use App\Http\Controllers\Site\WhishListController;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// SITE
Route::group(['namespace' => 'Site'], function () {
	// Home
	Route::get('/', [HomeController::class, 'index'])->name('home');
	// Institucional
	Route::group(['prefix' => 'lumel-decor'], function () {
		Route::get('sobre-nos', [AboutController::class, 'index'])->name('about');
		Route::get('perguntas-frequestes', [FaqController::class, 'index'])->name('faq');
		Route::get('termos-condicoes', [TermsController::class, 'index'])->name('terms');
	});
	// Contato
	Route::get('contato', [ContactController::class, 'index'])->name('contact');
	Route::post('enviar-contato', [ContactController::class, 'send'])->name('contact.send');
	// Carrinho
	Route::get('carrinho', [ShopCartController::class, 'show'])->name('shopcart.show');
	Route::post('carrinho', [ShopCartController::class, 'add'])->name('shopcart.add');
	// Produtos
	Route::any('produtos/{module}/{search}', [ProductController::class, 'show'])->name('product.show');
	// Route::get('detalhes/{table}/{search}/{slug}', [ProductController::class, 'detail'])->name('product.detail');
	Route::get('detalhes/{slug}', [ProductController::class, 'detail'])->name('product.detail');
	Route::get('finalizar-compra', [CheckoutController::class, 'index'])->name('checkout');
	Route::get('meus-favoritos', [WhishListController::class, 'index'])->name('whishlist');
	// Calcula frete
	Route::post('shipping/calculator/one', [ShippingController::class, 'calcOne']);
	Route::post('shipping/calculator/all', [ShippingController::class, 'calcAll']);
});

// ADMIN
/**
 * Rotas protegidas do Admin
 */
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
	// Home
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

	// Materials
	Route::get('material/listar', [MaterialController::class, 'index'])->name('material.list');
	Route::any('material/buscar', [MaterialController::class, 'index'])->name('material.search');
	Route::get('material/cadastrar', [MaterialController::class, 'create'])->name('material.create');
	Route::post('material/salvar', [MaterialController::class, 'store'])->name('material.store');
	Route::get('material/editar/{id}', [MaterialController::class, 'edit'])->name('material.edit');
	Route::put('material/atualizar/{id}', [MaterialController::class, 'update'])->name('material.update');
	Route::get('material/status/{id}', [MaterialController::class, 'changeStatus'])->name('material.status');
	// Categories
	Route::get('categoria/listar', [CategoryController::class, 'index'])->name('category.list');
	Route::any('categoria/buscar', [CategoryController::class, 'index'])->name('category.search');
	Route::get('categoria/cadastrar', [CategoryController::class, 'create'])->name('category.create');
	Route::post('categoria/salvar', [CategoryController::class, 'store'])->name('category.store');
	Route::get('categoria/editar/{id}', [CategoryController::class, 'edit'])->name('category.edit');
	Route::put('categoria/atualizar/{id}', [CategoryController::class, 'update'])->name('category.update');
	Route::get('categoria/status/{id}', [CategoryController::class, 'changeStatus'])->name('category.status');
	// Products
	Route::get('produto/listar', [ProductController::class, 'index'])->name('product.list');
	Route::any('produto/buscar', [ProductController::class, 'index'])->name('product.search');
	Route::get('produto/cadastrar', [ProductController::class, 'create'])->name('product.create');
	Route::post('produto/salvar', [ProductController::class, 'store'])->name('product.store');
	Route::get('produto/editar/{productId}', [ProductController::class, 'edit'])->name('product.edit');
	Route::put('produto/atualizar/{productId}', [ProductController::class, 'update'])->name('product.update');
	Route::get('produto/status/{productId}', [ProductController::class, 'changeStatus'])->name('product.status');
	// Products Size
	Route::get('produto/tamanho/cadastrar/{productId}', [ProductSizeController::class, 'create'])->name('product-size.create');
	Route::post('produto/tamanho/salvar', [ProductSizeController::class, 'store'])->name('product-size.store');
	Route::get('produto/tamanho/editar/{productId}/{productSizeId}', [ProductSizeController::class, 'edit'])->name('product-size.edit');
	Route::put('produto/tamanho/atualizar/{productSizeId}', [ProductSizeController::class, 'update'])->name('product-size.update');
	Route::get('produto/tamanho/status/{productId}/{productSizeId}', [ProductSizeController::class, 'changeStatus'])->name('product-size.status');
	// Item
	Route::get('item/cadastrar/{productId}/{productSizeId}', [ItemController::class, 'create'])->name('item.create');
	Route::post('item/salvar', [ItemController::class, 'store'])->name('item.store');
	Route::get('item/editar/{itemId}/{productId}/{productSizeId}', [ItemController::class, 'edit'])->name('item.edit');
	Route::put('item/atualizar/{itemId}', [ItemController::class, 'update'])->name('item.update');
	Route::get('item/status/{itemId}/{productId}/{productSizeId}', [ItemController::class, 'changeStatus'])->name('item.status');
	// Images
	Route::get('item/remover-foto/{picture}', [ItemPictureController::class, 'destroy'])->name('item-picture.remove');
	// Stocks
	Route::get('estoque/listar', [StockController::class, 'index'])->name('stock.list');
	Route::get('estoque/mostrar/{itemId}', [StockController::class, 'show'])->name('stock.show');
	Route::any('estoque/buscar', [StockController::class, 'index'])->name('stock.search');
	Route::get('estoque/editar/{id}', [StockController::class, 'edit'])->name('stock.edit');
	Route::put('estoque/atualizar/{id}', [StockController::class, 'update'])->name('stock.update');
	Route::post('reason/options', [ReasonController::class, 'options']);
	// Colors
	Route::get('cor/listar', [ColorController::class, 'index'])->name('color.list');
	Route::any('cor/buscar', [ColorController::class, 'index'])->name('color.search');
	Route::get('cor/cadastrar', [ColorController::class, 'create'])->name('color.create');
	Route::post('cor/salvar', [ColorController::class, 'store'])->name('color.store');
	Route::get('cor/editar/{id}', [ColorController::class, 'edit'])->name('color.edit');
	Route::put('cor/atualizar/{id}', [ColorController::class, 'update'])->name('color.update');
	Route::get('cor/status/{id}', [ColorController::class, 'changeStatus'])->name('color.status');
	// Tones
	Route::get('tonalidade/listar', [ToneController::class, 'index'])->name('tone.list');
	Route::any('tonalidade/buscar', [ToneController::class, 'index'])->name('tone.search');
	Route::get('tonalidade/cadastrar', [ToneController::class, 'create'])->name('tone.create');
	Route::post('tonalidade/salvar', [ToneController::class, 'store'])->name('tone.store');
	Route::get('tonalidade/editar/{id}', [ToneController::class, 'edit'])->name('tone.edit');
	Route::put('tonalidade/atualizar/{id}', [ToneController::class, 'update'])->name('tone.update');
	Route::get('tonalidade/status/{id}', [ToneController::class, 'changeStatus'])->name('tone.status');
	// Themes
	Route::get('tema/listar', [ThemeController::class, 'index'])->name('theme.list');
	Route::any('tema/buscar', [ThemeController::class, 'index'])->name('theme.search');
	Route::get('tema/cadastrar', [ThemeController::class, 'create'])->name('theme.create');
	Route::post('tema/salvar', [ThemeController::class, 'store'])->name('theme.store');
	Route::get('tema/editar/{id}', [ThemeController::class, 'edit'])->name('theme.edit');
	Route::put('tema/atualizar/{id}', [ThemeController::class, 'update'])->name('theme.update');
	Route::get('tema/status/{id}', [ThemeController::class, 'changeStatus'])->name('theme.status');



	// Campaign
	Route::get('campanha/listar', [CampaignController::class, 'index'])->name('campaign.list');
	Route::any('campanha/buscar', [CampaignController::class, 'index'])->name('campaign.search');
	Route::get('campanha/cadastrar', [CampaignController::class, 'create'])->name('campaign.create');
	Route::post('campanha/salvar', [CampaignController::class, 'store'])->name('campaign.store');
	Route::get('campanha/editar/{id}', [CampaignController::class, 'edit'])->name('campaign.edit');
	Route::put('campanha/atualizar/{id}', [CampaignController::class, 'update'])->name('campaign.update');
	Route::get('campanha/status/{id}', [CampaignController::class, 'changeStatus'])->name('campaign.status');
	// Offer Coupons
	Route::get('cupom/listar', [OfferCouponController::class, 'index'])->name('coupon.list');
	Route::any('cupom/buscar', [OfferCouponController::class, 'index'])->name('coupon.search');
	Route::get('cupom/cadastrar', [OfferCouponController::class, 'create'])->name('coupon.create');
	Route::post('cupom/salvar', [OfferCouponController::class, 'store'])->name('coupon.store');
	Route::get('cupom/editar/{id}', [OfferCouponController::class, 'edit'])->name('coupon.edit');
	Route::put('cupom/atualizar/{id}', [OfferCouponController::class, 'update'])->name('coupon.update');
	Route::get('cupom/status/{id}', [OfferCouponController::class, 'changeStatus'])->name('coupon.status');
	// Offer Promotions
	Route::get('promocao/listar', [OfferPromotionController::class, 'index'])->name('promotion.list');
	Route::any('promocao/buscar', [OfferPromotionController::class, 'index'])->name('promotion.search');
	Route::get('promocao/cadastrar', [OfferPromotionController::class, 'create'])->name('promotion.create');
	Route::post('promocao/salvar', [OfferPromotionController::class, 'store'])->name('promotion.store');
	Route::get('promocao/editar/{id}', [OfferPromotionController::class, 'edit'])->name('promotion.edit');
	Route::put('promocao/atualizar/{id}', [OfferPromotionController::class, 'update'])->name('promotion.update');
	Route::get('promocao/status/{id}', [OfferPromotionController::class, 'changeStatus'])->name('promotion.status');

		// // Orders
		// Route::get('encomenda/lista', [OrderController::class, 'index'])->name('order.list');
		// Route::any('encomenda/busca', [OrderController::class, 'index'])->name('order.search');
		// Route::get('encomenda/nova', [OrderController::class, 'index'])->name('order.create');
		// Route::post('encomenda/salvar', [OrderController::class, 'store'])->name('order.store');
		// Route::get('encomenda/editar/{id}/{page}', [OrderController::class, 'edit'])->name('order.edit');
		// Route::get('encomenda/status/{id}', [OrderController::class, 'changeStatus'])->name('order.status');

	// 	// Contact Message
	// 	Route::get('mensagem/lista', [ContactMessageController::class, 'index'])->name('message.list');
	// 	Route::get('mensagem/{id}/{page}', [ContactMessageController::class, 'view'])->name('message.view');
	// 	Route::post('mensagem/nao-lida', [ContactMessageController::class, 'read'])->name('message.read');

	// Customers
	Route::get('cliente/listar', [CustomerController::class, 'index'])->name('customer.list');
	Route::any('cliente/buscar', [CustomerController::class, 'index'])->name('customer.search');
	Route::get('cliente/cadastrar', [CustomerController::class, 'create'])->name('customer.create');
	Route::post('cliente/salvar', [CustomerController::class, 'store'])->name('customer.store');
	Route::get('cliente/editar/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
	Route::put('cliente/atualizar/{id}', [CustomerController::class, 'update'])->name('customer.update');
	Route::get('cliente/status/{id}', [CustomerController::class, 'changeStatus'])->name('customer.status');
	// Employee
	Route::get('funcionario/listar', [EmployeeController::class, 'index'])->name('employee.list');
	Route::any('funcionario/buscar', [EmployeeController::class, 'index'])->name('employee.search');
	Route::get('funcionario/cadastrar', [EmployeeController::class, 'create'])->name('employee.create');
	Route::post('funcionario/salvar', [EmployeeController::class, 'store'])->name('employee.store');
	Route::get('funcionario/editar/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
	Route::put('funcionario/atualizar/{id}', [EmployeeController::class, 'update'])->name('employee.update');
	Route::get('funcionario/status/{id}', [EmployeeController::class, 'changeStatus'])->name('employee.status');
	// Suppliers
	Route::get('fornecedor/listar', [SupplierController::class, 'index'])->name('supplier.list');
	Route::any('fornecedor/buscar', [SupplierController::class, 'index'])->name('supplier.search');
	Route::get('fornecedor/cadastrar', [SupplierController::class, 'create'])->name('supplier.create');
	Route::post('fornecedor/salvar', [SupplierController::class, 'store'])->name('supplier.store');
	Route::get('fornecedor/editar/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
	Route::put('fornecedor/atualizar/{id}', [SupplierController::class, 'update'])->name('supplier.update');
	Route::get('fornecedor/status/{id}', [SupplierController::class, 'changeStatus'])->name('supplier.status');
	// Users
	Route::get('usuario/listar', [UserController::class, 'index'])->name('user.list');
	Route::any('usuario/buscar', [UserController::class, 'index'])->name('user.search');
	// Route::get('usuario/cadastrar', [UserController::class, 'create'])->name('user.create');
	// Route::post('usuario/salvar', [UserController::class, 'store'])->name('user.store');
	Route::get('usuario/editar/{id}', [UserController::class, 'edit'])->name('user.edit');
	Route::put('usuario/atualizar/{id}', [UserController::class, 'update'])->name('user.update');
	Route::get('usuario/status/{id}', [UserController::class, 'changeStatus'])->name('user.status');
	// // Profile
	// Route::get('meus-dados', [UserController::class, 'index'])->name('profile');
});

/**
 * Autenticacao
 */
// Auth::routes(['register' => false]);

Auth::routes();
