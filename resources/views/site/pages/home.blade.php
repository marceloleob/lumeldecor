@extends('site.layouts.home')

@section('content')
	{{-- START SECTION LAUNCH --}}
	<div class="section py_50">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading_tab_header">
						<div class="heading_s2">
							<h2><i class="fas fa-rocket"></i> Lançamentos</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-rocket launch"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img1.jpg') !!}" alt="product_img1">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">Blue Dress For Woman</a></h6>
									<div class="product_price">
										<span class="price">$45.00</span>
										<del>$55.25</del>
										<div class="on_sale">
											<span>35% Off</span>
										</div>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span data-color="#87554B" class="active"></span>
											<span data-color="#333333"></span>
											<span data-color="#DA323F"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-rocket launch"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img2.jpg') !!}" alt="product_img2">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">Lether Gray Tuxedo</a></h6>
									<div class="product_price">
										<span class="price">$55.00</span>
										<del>$95.00</del>
										<div class="on_sale">
											<span>25% Off</span>
										</div>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#847764"></span>
											<span data-color="#0393B5"></span>
											<span data-color="#DA323F"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-rocket launch"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img3.jpg') !!}" alt="product_img3">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">woman full sliv dress</a></h6>
									<div class="product_price">
										<span class="price">$68.00</span>
										<del>$99.00</del>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#333333"></span>
											<span data-color="#7C502F"></span>
											<span data-color="#2F366C"></span>
											<span data-color="#874A3D"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-rocket launch"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img4.jpg') !!}" alt="product_img4">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i></a></li>
											<li><a href="#" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">light blue Shirt</a></h6>
									<div class="product_price">
										<span class="price">$69.00</span>
										<del>$89.00</del>
										<div class="on_sale">
											<span>20% Off</span>
										</div>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#333333"></span>
											<span data-color="#A92534"></span>
											<span data-color="#B9C2DF"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-rocket launch"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img5.jpg') !!}" alt="product_img5">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">blue dress for woman</a></h6>
									<div class="product_price">
										<span class="price">$45.00</span>
										<del>$55.25</del>
										<div class="on_sale">
											<span>35% Off</span>
										</div>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#87554B"></span>
											<span data-color="#333333"></span>
											<span data-color="#5FB7D4"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- END SECTION LAUNCH --}}

	{{-- START SECTION FEATURED --}}
	<div class="section py_50">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading_tab_header">
						<div class="heading_s2">
							<h2><i class="fas fa-star"></i> Destaques</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-star featured"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img1.jpg') !!}" alt="product_img1">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">Blue Dress For Woman</a></h6>
									<div class="product_price">
										<span class="price">$45.00</span>
										<del>$55.25</del>
										<div class="on_sale">
											<span>35% Off</span>
										</div>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span data-color="#87554B" class="active"></span>
											<span data-color="#333333"></span>
											<span data-color="#DA323F"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-star featured"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img2.jpg') !!}" alt="product_img2">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">Lether Gray Tuxedo</a></h6>
									<div class="product_price">
										<span class="price">$55.00</span>
										<del>$95.00</del>
										<div class="on_sale">
											<span>25% Off</span>
										</div>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#847764"></span>
											<span data-color="#0393B5"></span>
											<span data-color="#DA323F"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-star featured"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img3.jpg') !!}" alt="product_img3">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">woman full sliv dress</a></h6>
									<div class="product_price">
										<span class="price">$68.00</span>
										<del>$99.00</del>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#333333"></span>
											<span data-color="#7C502F"></span>
											<span data-color="#2F366C"></span>
											<span data-color="#874A3D"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-star featured"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img4.jpg') !!}" alt="product_img4">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">light blue Shirt</a></h6>
									<div class="product_price">
										<span class="price">$69.00</span>
										<del>$89.00</del>
										<div class="on_sale">
											<span>20% Off</span>
										</div>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#333333"></span>
											<span data-color="#A92534"></span>
											<span data-color="#B9C2DF"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-star featured"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img5.jpg') !!}" alt="product_img5">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">blue dress for woman</a></h6>
									<div class="product_price">
										<span class="price">$45.00</span>
										<del>$55.25</del>
										<div class="on_sale">
											<span>35% Off</span>
										</div>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#87554B"></span>
											<span data-color="#333333"></span>
											<span data-color="#5FB7D4"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- END SECTION FEATURED --}}

	{{-- START SECTION BANNER --}}
	@include('site.partials.banners.three')
	{{-- END SECTION BANNER --}}

	{{-- START SECTION BEST SELLERS --}}
	<div class="section py_50">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading_tab_header">
						<div class="heading_s2">
							<h2><i class="fas fa-fire"></i> Mais Vendidos</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-fire best-seller"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img1.jpg') !!}" alt="product_img1">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">Blue Dress For Woman</a></h6>
									<div class="product_price">
										<span class="price">$45.00</span>
										<del>$55.25</del>
										<div class="on_sale">
											<span>35% Off</span>
										</div>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#87554B"></span>
											<span data-color="#333333"></span>
											<span data-color="#DA323F"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-fire best-seller"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img2.jpg') !!}" alt="product_img2">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">Lether Gray Tuxedo</a></h6>
									<div class="product_price">
										<span class="price">$55.00</span>
										<del>$95.00</del>
										<div class="on_sale">
											<span>25% Off</span>
										</div>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#847764"></span>
											<span data-color="#0393B5"></span>
											<span data-color="#DA323F"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-fire best-seller"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img3.jpg') !!}" alt="product_img3">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">woman full sliv dress</a></h6>
									<div class="product_price">
										<span class="price">$68.00</span>
										<del>$99.00</del>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#333333"></span>
											<span data-color="#7C502F"></span>
											<span data-color="#2F366C"></span>
											<span data-color="#874A3D"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-fire best-seller"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img4.jpg') !!}" alt="product_img4">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">light blue Shirt</a></h6>
									<div class="product_price">
										<span class="price">$69.00</span>
										<del>$89.00</del>
										<div class="on_sale">
											<span>20% Off</span>
										</div>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#333333"></span>
											<span data-color="#A92534"></span>
											<span data-color="#B9C2DF"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-fire best-seller"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img5.jpg') !!}" alt="product_img5">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
											<li><a href="#"><i class="icon-heart"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product_info">
									<h6 class="product_title"><a href="shop-product-detail.html">blue dress for woman</a></h6>
									<div class="product_price">
										<span class="price">$45.00</span>
										<del>$55.25</del>
										<div class="on_sale">
											<span>35% Off</span>
										</div>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="product_colors">
										<div class="product_color">
											<span class="active" data-color="#87554B"></span>
											<span data-color="#333333"></span>
											<span data-color="#5FB7D4"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- END SECTION BEST SELLERS --}}
@endsection
