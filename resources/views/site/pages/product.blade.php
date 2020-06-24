@extends('site.layouts.pages')

@section('content')

	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">

					{{-- HEAD --}}
					<div class="row align-items-center mb-4 pb-1">
						<div class="col-12">
							<div class="product_header">
								<div class="product_header_left">
									<div class="custom_select">
										{!! Form::selectSort('sort', old('sort', 'best-seller'), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
									</div>
								</div>
								<div class="product_header_right">
									<div class="products_view">
										<a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
										<a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
									</div>
									<div class="custom_select">
										{!! Form::selectShow('show', '', ['class' => 'form-control selectpicker', 'title' => 'Mostrar']) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- END HEAD --}}

					{{-- LIST --}}
					<div class="row shop_container">

						{{-- PRODUCT --}}
						<div class="col-md-4 col-6">
							<div class="product">
								<span class="pr_flash"><i class="fas fa-rocket launch"></i></span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('assets/images/product_img2.jpg') !!}" alt="nome do produto">
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
									<h6 class="product_title"><a href="shop-product-detail.html">Lether Gray Tuxedo</a></h6>
									<div class="product_price">
										<span class="price">$55.00</span>
									</div>
									<div class="product_infos">
										<div class="product_color">
											<span style="background-color: #847764" class="active"></span>
											<span style="background-color: #0393B5"></span>
											<span style="background-color: #DA323F"></span>
										</div>
										<div class="product_size">
											<span>P</span>
											<span class="active">M</span>
											<span>G</span>
											{{-- <span class="alone">tamanho único</span> --}}
										</div>
									</div>
								</div>
							</div>
						</div>
						{{-- END PRODUCT --}}

					</div>
					{{-- END LIST --}}

					{{-- PAGINATION --}}
					<div class="row">
						<div class="col-12">
							{!! $paginate !!}
							<ul class="pagination mt-3 justify-content-center pagination_style1">
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
							</ul>
						</div>
					</div>
					{{-- END PAGINATION --}}
				</div>

				{{-- FILTERS --}}
				<div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
					<div class="sidebar">
						<div class="widget">
							<h5 class="widget_title">Categorias</h5>
							<ul class="widget_categories">
								<li><a href="#"><span class="categories_name">Bandejas</span><span class="categories_num">(9)</span></a></li>
								<li><a href="#"><span class="categories_name">Boleiras</span><span class="categories_num">(6)</span></a></li>
								<li><a href="#"><span class="categories_name">Canecas</span><span class="categories_num">(4)</span></a></li>
								<li><a href="#"><span class="categories_name">Vasos</span><span class="categories_num">(7)</span></a></li>
							</ul>
						</div>
						{{-- <div class="widget">
							<h5 class="widget_title">Filter</h5>
							<div class="filter_price">
								<div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300" data-price-sign="$"></div>
								<div class="price_range">
									<span>Price: <span id="flt_price"></span></span>
									<input type="hidden" id="price_first">
									<input type="hidden" id="price_second">
								</div>
							</div>
						</div> --}}
						<div class="widget">
							<h5 class="widget_title">Temas</h5>
							<ul class="list_brand">
								<li>
									<div class="custome-checkbox">
										<input class="form-check-input" type="checkbox" name="checkbox" id="Arrivals" value="">
										<label class="form-check-label" for="Arrivals"><span>A Bella e a Fera</span></label>
									</div>
								</li>
								<li>
									<div class="custome-checkbox">
										<input class="form-check-input" type="checkbox" name="checkbox" id="Lighting" value="">
										<label class="form-check-label" for="Lighting"><span>Bailarinas</span></label>
									</div>
								</li>
								<li>
									<div class="custome-checkbox">
										<input class="form-check-input" type="checkbox" name="checkbox" id="Tables" value="">
										<label class="form-check-label" for="Tables"><span>Chuva de Amor</span></label>
									</div>
								</li>
								<li>
									<div class="custome-checkbox">
										<input class="form-check-input" type="checkbox" name="checkbox" id="Chairs" value="">
										<label class="form-check-label" for="Chairs"><span>Fazendinha</span></label>
									</div>
								</li>
								<li>
									<div class="custome-checkbox">
										<input class="form-check-input" type="checkbox" name="checkbox" id="Accessories" value="">
										<label class="form-check-label" for="Accessories"><span>Natal</span></label>
									</div>
								</li>
							</ul>
						</div>
						<div class="widget">
							<h5 class="widget_title">Tamanhos</h5>
							<div class="product_size_switch">
								<span>PP</span>
								<span>P</span>
								<span>M</span>
								<span>G</span>
								<span>GG</span>
								<span>U</span>
							</div>
						</div>
						<div class="widget">
							<h5 class="widget_title">Cores</h5>
							<div class="product_color_switch">
								<span style="background-color: #87554B"></span>
								<span style="background-color: #333333"></span>
								<span style="background-color: #DA323F"></span>
								<span style="background-color: #2F366C"></span>
								<span style="background-color: #B5B6BB"></span>
								<span style="background-color: #B9C2DF"></span>
								<span style="background-color: #5FB7D4"></span>
								<span style="background-color: #2F366C"></span>
							</div>
						</div>
						<div class="widget">
							<div class="shop_banner">
								<div class="banner_img overlay_bg_20">
									<img src="{!! asset('assets/images/sidebar_banner_img.jpg') !!}" alt="sidebar_banner_img">
								</div>
								<div class="shop_bn_content2 text_white">
									<h5 class="text-uppercase shop_subtitle">Novidade</h5>
									<h3 class="text-uppercase shop_title">30% Off</h3>
									<a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Compre agora!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- END FILTERS --}}
			</div>
		</div>
	</div>

@endsection
