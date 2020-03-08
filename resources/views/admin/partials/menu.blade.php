
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
		<ul class="vertical-nav-menu">

			<li class="app-sidebar__heading">PAINEL DE CONTROLES</li>
			<li>
				<a href="{!! route('dashboard') !!}" class="{!! (request()->is('admin')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-chart-line"></i> Início</a>
			</li>

			<li class="app-sidebar__heading">PRODUTOS</li>
			<li>
				<a href="{!! route('materials') !!}" class="{!! (request()->is('admin/materiais')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-dolly-flatbed"></i> Materiais</a>
			</li>
			<li>
				<a href="{!! route('categories') !!}" class="{!! (request()->is('admin/categorias')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-store"></i> Categorias</a>
			</li>
			<li>
				<a href="{!! route('themes') !!}" class="{!! (request()->is('admin/temas')) ? 'mm-active' : '' !!}"><i class="metismenu-icon far fa-star"></i> Temas</a>
			</li>
			<li>
				<a href="{!! route('colors') !!}" class="{!! (request()->is('admin/cores')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-palette"></i> Cores</a>
			</li>
			<li>
				<a href="{!! route('products') !!}" class="{!! (request()->is('admin/produtos')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-cubes"></i> Produtos</a>
			</li>

			<li class="app-sidebar__heading">LOJA</li>
			<li>
				<a href="javascript:void(0);" aria-expanded="{!! (request()->is('admin/cupons')) || (request()->is('admin/promocoes')) ? 'true' : 'false' !!}"><i class="metismenu-icon fas fa-search-dollar"></i> Ofertas <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
				<ul class="{!! (request()->is('admin/cupons')) || (request()->is('admin/promocoes')) ? 'mm-collapse mm-show' : '' !!}">
					<li>
						<a href="{!! route('coupons') !!}" class="{!! (request()->is('admin/cupons')) ? 'mm-active' : '' !!}"><i class="metismenu-icon"></i> Cupons de Descontos</a>
					</li>
					<li>
						<a href="{!! route('promotions') !!}" class="{!! (request()->is('admin/promocoes')) ? 'mm-active' : '' !!}"><i class="metismenu-icon"></i> Promoções</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="{!! route('orders') !!}" class="{!! (request()->is('admin/encomendas')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-dolly"></i> Encomendas</a>
			</li>
			<li>
				<a href="{!! route('stocks') !!}" class="{!! (request()->is('admin/estoques')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-warehouse"></i> Estoques</a>
			</li>
			<li>
				<a href="{!! route('posts') !!}" class="{!! (request()->is('admin/mensagens')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-envelope"></i> Mensagens</a>
			</li>

			<li class="app-sidebar__heading">CLIENTES</li>
			<li>
				<a href="{!! route('customers') !!}" class="{!! (request()->is('admin/clientes')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-users"></i> Todos</a>
			</li>

			<li class="app-sidebar__heading">FORNECEDORES</li>
			<li>
				<a href="{!! route('suppliers') !!}" class="{!! (request()->is('admin/fornecedores')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-user-tie"></i> Todos</a>
			</li>

			<li class="app-sidebar__heading">USUÁRIOS</li>
			<li>
				<a href="{!! route('users') !!}" class="{!! (request()->is('admin/usuarios')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-users-cog"></i> Todos</a>
			</li>

			<li class="app-sidebar__heading">CONFIGURAÇÕES</li>
			<li>
				<a href="{!! route('profile') !!}" class="{!! (request()->is('admin/meus-dados')) ? 'mm-active' : '' !!}"><i class="metismenu-icon fas fa-user-cog"></i> Meus dados</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="logout"><i class="metismenu-icon fas fa-sign-out-alt"></i> Sair</a>
			</li>
		</ul>
	</div>
</div>
