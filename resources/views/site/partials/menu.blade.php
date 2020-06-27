
{{-- MENU --}}
<div class="bottom_header dark_skin main_menu_uppercase bg_tiffany">
	<div class="container">
		<div class="row align-items-center">

			{{-- MENU VERTICAL ESQUERDO --}}
			<div class="col-lg-3 col-md-4 col-sm-6 col-3">
				<div class="categories_wrap">
					<button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn">
						<i class="linearicons-menu"></i> <span>Todos os Materiais</span>
					</button>
					<div id="navCatContent" class="{!! ($current === 'home') ? 'nav_cat' : '' !!} navbar collapse" data-page="{!! $current !!}">
						<ul>
							@foreach ($menu['materials'] as $material)
								<li><a class="dropdown-item nav-link nav_item {!! ($current === $material['slug']) ? 'active' : '' !!}" href="{!! route('product.show', ['material', $material['slug']]) !!}"><i class="ico-heart"></i> <span class="heart">{!! $material['name'] !!}</span></a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			{{-- MENU VERTICAL ESQUERDO --}}

			{{-- MENU HORIZONTAL BARRA --}}
			<div class="col-lg-9 col-md-8 col-sm-6 col-9">
				<nav class="navbar navbar-expand-lg">
					<button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false">
						<span class="ion-android-menu"></span>
					</button>
					<div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
						<ul class="navbar-nav">
							<li>
								<a class="nav-link nav_item {!! ($current === 'home') ? 'active' : '' !!}" href="{!! route('home') !!}">Início</a>
							</li>
							<li class="dropdown dropdown-mega-menu">
								<a class="dropdown-toggle nav-link {!! (request()->is('*categoria*')) ? 'active' : '' !!}" href="#" data-toggle="dropdown">Categorias</a>
								<div class="dropdown-menu">
									<ul class="mega-menu d-lg-flex">
										<li class="mega-menu-col col-lg-4">
											<ul>
												@foreach ($menu['categories'][0] as $category)
													<li><a href="{!! route('product.show', ['categoria', $category['slug']]) !!}" class="dropdown-item nav-link nav_item {!! ($current === $category['slug']) ? 'active' : '' !!}">{!! $category['name'] !!}</a></li>
												@endforeach
											</ul>
										</li>
										<li class="mega-menu-col col-lg-4">
											<ul>
												@foreach ($menu['categories'][1] as $category)
													<li><a href="{!! route('product.show', ['categoria', $category['slug']]) !!}" class="dropdown-item nav-link nav_item {!! ($current === $category['slug']) ? 'active' : '' !!}">{!! $category['name'] !!}</a></li>
												@endforeach
											</ul>
										</li>
										<li class="mega-menu-col col-lg-4">
											<ul>
												@foreach ($menu['categories'][2] as $category)
													<li><a href="{!! route('product.show', ['categoria', $category['slug']]) !!}" class="dropdown-item nav-link nav_item {!! ($current === $category['slug']) ? 'active' : '' !!}">{!! $category['name'] !!}</a></li>
												@endforeach
											</ul>
										</li>
									</ul>
								</div>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle nav-link {!! (request()->is('*cor*')) ? 'active' : '' !!}" href="#" data-toggle="dropdown">Cores</a>
								<div class="dropdown-menu">
									<ul>
										@foreach ($menu['colors'] as $color)
											<li>
												<a href="{!! route('product.show', ['cor', $color['slug']]) !!}" class="dropdown-item nav-link nav_item {!! ($current === $color['slug']) ? 'active' : '' !!}">
													<img src="{!! asset('images/icons/' . $color['icon']) !!}" class="colors" /> {!! $color['name'] !!}
												</a>
											</li>
										@endforeach
									</ul>
								</div>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle nav-link {!! (request()->is('*tema*')) ? 'active' : '' !!}" href="#" data-toggle="dropdown">Temas</a>
								<div class="dropdown-menu">
									<ul>
										@foreach ($menu['themes'] as $theme)
											<li><a href="{!! route('product.show', ['tema', $theme['slug']]) !!}" class="dropdown-item nav-link nav_item {!! ($current === $theme['slug']) ? 'active' : '' !!}">{!! $theme['name'] !!}</a></li>
										@endforeach
									</ul>
								</div>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle nav-link {!! (request()->is('*lumel-decor*')) ? 'active' : '' !!}" href="#" data-toggle="dropdown">Lumel Decor</a>
								<div class="dropdown-menu">
									<ul>
										<li><a class="dropdown-item nav-link nav_item {!! ($current === 'about') ? 'active' : '' !!}" href="{!! route('about') !!}">Sobre nós</a></li>
										<li><a class="dropdown-item nav-link nav_item {!! ($current === 'faq') ? 'active' : '' !!}" href="{!! route('faq') !!}">Perguntas Frequentes</a></li>
										<li><a class="dropdown-item nav-link nav_item {!! ($current === 'terms') ? 'active' : '' !!}" href="{!! route('terms') !!}">Termos e Condições</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a class="nav-link nav_item {!! ($current === 'contact') ? 'active' : '' !!}" href="{!! route('contact') !!}">Contato</a>
							</li>
						</ul>
					</div>

					{{-- INFORMACOES DO USUARIO --}}
					<ul class="navbar-nav attr-nav align-items-center">
						<li><a href="#" class="nav-link"><i class="linearicons-user"></i></a></li>
						<li><a href="#" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li>
						<li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span></a>
							<div class="cart_box dropdown-menu dropdown-menu-right">
								<ul class="cart_list">
									<li>
										<a href="#" class="item_remove"><i class="ion-close"></i></a>
										<a href="#"><img src="{!! asset('assets/images/cart_thamb1.jpg') !!}" alt="cart_thumb1">Variable product 001</a>
										<span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
									</li>
									<li>
										<a href="#" class="item_remove"><i class="ion-close"></i></a>
										<a href="#"><img src="{!! asset('assets/images/cart_thamb2.jpg') !!}" alt="cart_thumb2">Ornare sed consequat</a>
										<span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
									</li>
								</ul>
								<div class="cart_footer">
									<p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
									<p class="cart_buttons">
										{{-- <a href="#" class="btn btn-fill-line view-cart">View Cart</a> --}}
										<a href="#" class="btn btn-fill-out checkout">Ver Carrinho</a>
									</p>
								</div>
							</div>
						</li>
					</ul>
					{{-- INFORMACOES DO USUARIO --}}

					<div class="pr_search_icon">
						<a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
					</div>
				</nav>
			</div>
			{{-- MENU HORIZONTAL BARRA FIM --}}

		</div>
	</div>
</div>
{{-- MENU FIM --}}
