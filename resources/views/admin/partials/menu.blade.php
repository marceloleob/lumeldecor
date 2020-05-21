
<div class="app-header__logo">
	<div class="logo-src"></div>
	<div class="header__pane ml-auto">
		<div>
			<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>
	</div>
</div>
<div class="app-header__mobile-menu">
	<div>
		<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>
	</div>
</div>
<div class="app-header__menu">
	<span>
		<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
			<span class="btn-icon-wrapper">
				<i class="fa fa-ellipsis-v fa-w-6"></i>
			</span>
		</button>
	</span>
</div>
<div class="scrollbar-sidebar">
	<div class="app-sidebar__inner">
		<ul id="metismenu" class="vertical-nav-menu">

			<li class="app-sidebar__heading">PAINEL DE CONTROLES</li>
			<li>
				<a href="{!! route('dashboard') !!}" class="{!! (request()->is('admin')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-chart-line icon-gradient bg-ripe-malin"></i> Início</a>
			</li>

			<li class="app-sidebar__heading">LOJA</li>
			<li>
				<a href="{!! route('material.list') !!}" class="{!! (request()->is('admin/material/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-dolly-flatbed icon-gradient bg-plum-plate"></i> Materiais</a>
			</li>
			<li>
				<a href="{!! route('category.list') !!}" class="{!! (request()->is('admin/categoria/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-store"></i> Categorias</a>
			</li>
			<li>
				<a href="{!! route('theme.list') !!}" class="{!! (request()->is('admin/tema/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon far fa-star"></i> Temas</a>
			</li>
			<li>
				<a href="{!! route('color.list') !!}" class="{!! (request()->is('admin/cor/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-palette"></i> Cores</a>
			</li>
			<li>
				<a href="{!! route('product.list') !!}" class="{!! (request()->is('admin/produto/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-cubes"></i> Produtos</a>
			</li>
			<li>
				<a href="{!! route('campaign.list') !!}" class="{!! (request()->is('admin/campanha/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon far fa-calendar-alt"></i> Campanhas</a>
			</li>
			<li>
				<a href="{!! route('stock.list') !!}" class="{!! (request()->is('admin/estoques/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-warehouse"></i> Estoques</a>
			</li>

			<li class="app-sidebar__heading">SITE</li>
			<li>
				<a href="javascript:void(0);" aria-expanded="{!! ((request()->is('admin/cupom/*')) || (request()->is('admin/promocao/*')) || (request()->is('admin/campanhas'))) ? 'true' : 'false' !!}"><i class="metismenu-icon fas fa-search-dollar"></i> Ofertas <i class="metismenu-state-icon fas fa-angle-down caret-left"></i></a>
				<ul class="{!! ((request()->is('admin/cupom/*')) || (request()->is('admin/promocao/*')) || (request()->is('admin/campanhas'))) ? 'mm-collapse mm-show' : '' !!}">
					<li>
						<a href="{!! route('promotion.list') !!}" class="{!! (request()->is('admin/promocao/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon"></i> Promoções</a>
					</li>
					<li>
						<a href="{!! route('coupon.list') !!}" class="{!! (request()->is('admin/cupom/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon"></i> Cupons</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="{!! route('order.list') !!}" class="{!! (request()->is('admin/encomenda/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-dolly"></i> Encomendas</a>
			</li>
			<li>
				<a href="{!! route('message.list') !!}" class="{!! (request()->is('admin/mensagem/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-envelope"></i> Mensagens</a>
			</li>

			<li class="app-sidebar__heading">USUÁRIOS</li>
			<li>
				<a href="{!! route('customer.list') !!}" class="{!! (request()->is('admin/cliente/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-users"></i> Clientes</a>
			</li>
			<li>
				<a href="{!! route('supplier.list') !!}" class="{!! (request()->is('admin/fornecedor/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-user-tie"></i> Fornecedores</a>
			</li>
			<li>
				<a href="{!! route('user.list') !!}" class="{!! (request()->is('admin/usuario/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-users-cog"></i> Todos</a>
			</li>

			{{-- <li class="app-sidebar__heading">CONFIGURAÇÕES</li>
			<li>
				<a href="{!! route('profile') !!}" class="{!! (request()->is('admin/meus-dados/*')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-user-cog"></i> Meus dados</a>
			</li> --}}

			<li>
				<a href="javascript:void(0);" class="logout text-danger"><i class="metismenu-icon fas fa-sign-out-alt"></i> Sair</a>
			</li>
		</ul>
	</div>
</div>
