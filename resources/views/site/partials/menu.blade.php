
{{-- MENU --}}
<div class="bottom_header light_skin main_menu_uppercase bg_dark_gray">
	<div class="container">
		<div class="row align-items-center">

			{{-- MENU VERTICAL ESQUERDO --}}
			<div class="col-lg-3 col-md-4 col-sm-6 col-3">
				<div class="categories_wrap">
					<button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn">
						<i class="linearicons-menu"></i> <span>Todas as Categorias</span>
					</button>
					<div id="navCatContent" class="{!! ($page === 'home') ? 'nav_cat' : '' !!} navbar collapse" data-page="{!! $page !!}">
						<ul>
							<li><a class="dropdown-item nav-link nav_item" href="#"><i class="ico-heart"></i> <span class="heart">Clothing</span></a></li>
							<li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-headphones"></i> <span>Headphones</span></a></li>
							<li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-console"></i> <span>Gaming</span></a></li>
							<li><a class="dropdown-item nav-link nav_item" href="#"><i class="ico-heart"></i> <span class="heart">Clothing</span></a></li>
							<li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-headphones"></i> <span>Headphones</span></a></li>
							<li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-console"></i> <span>Gaming</span></a></li>
							<li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-watch"></i> <span>Watches</span></a></li>
							<li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-music-system"></i> <span>Home Audio & Theater</span></a></li>
							<li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-monitor"></i> <span>TV & Smart Box</span></a></li>
							<li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-printer"></i> <span>Printer</span></a></li>
							<li>
								<ul class="more_slide_open">
									<li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-pijamas"></i> <span>Sleepwear</span></a></li>
									<li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-scarf"></i> <span>Seasonal Wear</span></a></li>
									<li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-vintage"></i> <span>Ethinic Wear</span></a></li>
									<li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-pregnant"></i> <span>Baby Clothing</span></a></li>
								</ul>
							</li>
						</ul>
						<div class="more_categories">More Categories</div>
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
								<a class="nav-link nav_item {!! ($page === 'home') ? 'active' : '' !!}" href="{!! route('home') !!}">Início</a>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Materiais</a>
								<div class="dropdown-menu">
									<ul>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
									</ul>
								</div>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Cores</a>
								<div class="dropdown-menu">
									<ul>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
									</ul>
								</div>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Temas</a>
								<div class="dropdown-menu">
									<ul>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
										<li><a class="dropdown-item nav-link nav_item" href="#">Teste</a></li>
									</ul>
								</div>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Lumel Decor</a>
								<div class="dropdown-menu">
									<ul>
										<li><a class="dropdown-item nav-link nav_item {!! ($page === 'about') ? 'active' : '' !!}" href="{!! route('about') !!}">Sobre nós</a></li>
										<li><a class="dropdown-item nav-link nav_item {!! ($page === 'faq') ? 'active' : '' !!}" href="{!! route('faq') !!}">Perguntas Frequentes</a></li>
										<li><a class="dropdown-item nav-link nav_item {!! ($page === 'terms') ? 'active' : '' !!}" href="{!! route('terms') !!}">Termos e Condições</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a class="nav-link nav_item {!! ($page === 'contact') ? 'active' : '' !!}" href="{!! route('contact') !!}">Contato</a>
							</li>
						</ul>
					</div>
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
									<p class="cart_buttons"><a href="#" class="btn btn-fill-line view-cart">View Cart</a><a href="#" class="btn btn-fill-out checkout">Checkout</a></p>
								</div>
							</div>
						</li>
					</ul>
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
