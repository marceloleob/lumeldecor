@extends('site.layouts.pages-product')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{!! route('product.show', [$type, $current]) !!}">Lista dos Produtos</a></li>
<li class="breadcrumb-item active">Detalhes do Produto</li>
@endsection

@section('content')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 mb-4 mb-md-0">
					<div class="product-image vertical_gallery">
						<div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
							<div class="item">
								<a href="#" class="product_gallery_item active" data-image="{!! asset('storage/' . config('constants.PICTURES_PATHS.REGULAR') . '/' . $item->picture) !!}" data-zoom-image="{!! asset('storage/' . config('constants.PICTURES_PATHS.BIGGER') . '/' . $item->picture) !!}">
									<img src="{!! asset('storage/' . config('constants.PICTURES_PATHS.THUMBNAIL') . '/' . $item->picture) !!}" alt="{!! $item->product->name !!} - {!! $item->productSize->size !!}" />
								</a>
							</div>
							<div class="item">
								<a href="#" class="product_gallery_item" data-image="{!! asset('assets/images/product_img1-2') !!}.jpg" data-zoom-image="{!! asset('assets/images/product_zoom_img2.jpg') !!}">
									<img src="{!! asset('assets/images/product_small_img2.jpg') !!}" alt="product_small_img2" />
								</a>
							</div>
							<div class="item">
								<a href="#" class="product_gallery_item" data-image="{!! asset('assets/images/product_img1-3') !!}.jpg" data-zoom-image="{!! asset('assets/images/product_zoom_img3.jpg') !!}">
									<img src="{!! asset('assets/images/product_small_img3.jpg') !!}" alt="product_small_img3" />
								</a>
							</div>
							<div class="item">
								<a href="#" class="product_gallery_item" data-image="{!! asset('assets/images/product_img1-4') !!}.jpg" data-zoom-image="{!! asset('assets/images/product_zoom_img4.jpg') !!}">
									<img src="{!! asset('assets/images/product_small_img4.jpg') !!}" alt="product_small_img4" />
								</a>
							</div>
							<div class="item">
								<a href="#" class="product_gallery_item" data-image="{!! asset('assets/images/product_img1-4') !!}.jpg" data-zoom-image="{!! asset('assets/images/product_zoom_img4.jpg') !!}">
									<img src="{!! asset('assets/images/product_small_img4.jpg') !!}" alt="product_small_img4" />
								</a>
							</div>
							<div class="item">
								<a href="#" class="product_gallery_item" data-image="{!! asset('assets/images/product_img1-4') !!}.jpg" data-zoom-image="{!! asset('assets/images/product_zoom_img4.jpg') !!}">
									<img src="{!! asset('assets/images/product_small_img4.jpg') !!}" alt="product_small_img4" />
								</a>
							</div>
						</div>
						<div class="product_img_box">
							<img id="product_img" src="{!! asset('storage/' . config('constants.PICTURES_PATHS.REGULAR') . '/' . $item->picture) !!}" alt="{!! $item->product->name !!} - {!! $item->productSize->size !!}" data-zoom-image="{!! asset('storage/' . config('constants.PICTURES_PATHS.BIGGER') . '/' . $item->picture) !!}" />
							<a href="#" class="product_img_zoom" title="{!! $item->product->name !!} - {!! $item->productSize->size !!}">
								<span class="linearicons-zoom-in"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="pr_detail">
						<div class="product_description">
							<h4 class="product_title"><a href="#">{!! $item->product->name !!} - {!! $item->productSize->size !!}</a></h4>

							<div class="product_price">
								<span class="price">R$ {!! $item->s_price !!}</span>
								{{-- <del>R$ 25.00</del> --}}
								<div class="on_sale">
									{{-- <span>35% Off</span> --}}
								</div>
							</div>

							<div class="rating_wrap">
								{{-- <div class="rating">
									<div class="product_rate" style="width:80%"></div>
								</div>
								<span class="rating_num">(21)</span> --}}
							</div>

							<div class="pr_desc">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
							</div>

							<div class="product_sort_info">
								<ul>
									<li><i class="linearicons-shield-check"></i> Compre com segurança.</li>
									<li><i class="linearicons-sync"></i> Leia nossa <a href="{!! route('terms') !!}" target="_blank">Política de Devolução</a></li>
									<li><i class="linearicons-store"></i> Se preferir, pode retirar o produto em nossa loja.</li>
								</ul>
							</div>
							<div class="pr_switch_wrap">
								<span class="switch_lable">Cores disponíveis:</span>
								<div class="product_color_switch">
									@foreach ($colors as $colorItem)
										<a href="{!! route('product.detail', [$type, $current, $colorItem->product->slug, $colorItem->productSize->size, $colorItem->code]) !!}">
											<span style="{!! $colorItem->background !!}" {!! $colorItem->active !!} data-toggle="tooltip" data-placement="top" data-original-title="{!! $colorItem->tooltip !!}"></span>
										</a>
									@endforeach
								</div>
							</div>

							<div class="pr_switch_wrap">
								<span class="switch_lable">Tamanhos disponíveis:</span>
								<div class="product_size_switch">
									@foreach ($sizes as $size)
										<a href="{!! route('product.detail', [$type, $current, $item->product->slug, $size->size]) !!}">
											<span {!! $size->active !!}>{!! $size->size !!}</span>
										</a>
									@endforeach
								</div>
							</div>

						</div>
						<hr />
						<div class="cart_extra">
							<div class="cart-product-quantity">
								<div class="quantity">
									<input type="button" value="-" class="minus">
									<input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
									<input type="button" value="+" class="plus">
								</div>
							</div>
							<div class="cart_btn">
								<button class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Comprar</button>
								<a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
							</div>
						</div>
						<hr />
						<ul class="product-meta">
							<li>Código: <a href="#">{!! $item->code !!}</a></li>
							<li>Material: <a href="#">{!! $item->product->material->name !!}</a></li>
							<li>Categoria: <a href="#">{!! $item->product->category->name !!}</a></li>
						</ul>
						<div class="product_share">
							<span>Compartilhe:</span>
							<ul class="social_icons">
								<li><a href="#"><i class="ion-social-facebook"></i></a></li>
								<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="large_divider clearfix"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="tab-style3">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Descrição</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Informações Adicionais</a>
							</li>
						</ul>
						<div class="tab-content shop_info_tab">
							<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
								{!! $item->product->description !!}
							</div>
							<div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
								<table class="table table-bordered">
									<tr>
										<td>Capacity</td>
										<td>5 Kg</td>
									</tr>
									<tr>
										<td>Color</td>
										<td>Black, Brown, Red,</td>
									</tr>
									<tr>
										<td>Water Resistant</td>
										<td>Yes</td>
									</tr>
									<tr>
										<td>Material</td>
										<td>Artificial Leather</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="small_divider"></div>
					<div class="divider"></div>
					<div class="medium_divider"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="heading_s1">
						<h3>Releted Products</h3>
					</div>
					<div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
						<div class="item">
							<div class="product">
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('assets/images/product_img1.jpg') !!}" alt="product_img1">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopping-zone/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
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
									<div class="rating_wrap">
										<div class="rating">
											<div class="product_rate" style="width:80%"></div>
										</div>
										<span class="rating_num">(21)</span>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="pr_switch_wrap">
										<div class="product_color_switch">
											<span class="active" style="background-color: #87554B"></span>
											<span style="background-color: #333333"></span>
											<span style="background-color: #DA323F"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('assets/images/product_img2.jpg') !!}" alt="product_img2">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopping-zone/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
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
									<div class="rating_wrap">
										<div class="rating">
											<div class="product_rate" style="width:68%"></div>
										</div>
										<span class="rating_num">(15)</span>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="pr_switch_wrap">
										<div class="product_color_switch">
											<span class="active" style="background-color: #847764"></span>
											<span style="background-color: #0393B5"></span>
											<span style="background-color: #DA323F"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<span class="pr_flash">New</span>
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('assets/images/product_img3.jpg') !!}" alt="product_img3">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopping-zone/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
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
									<div class="rating_wrap">
										<div class="rating">
											<div class="product_rate" style="width:87%"></div>
										</div>
										<span class="rating_num">(25)</span>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="pr_switch_wrap">
										<div class="product_color_switch">
											<span class="active" style="background-color: #333333"></span>
											<span style="background-color: #7C502F"></span>
											<span style="background-color: #2F366C"></span>
											<span style="background-color: #874A3D"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('assets/images/product_img4.jpg') !!}" alt="product_img4">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopping-zone/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
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
									<div class="rating_wrap">
										<div class="rating">
											<div class="product_rate" style="width:70%"></div>
										</div>
										<span class="rating_num">(22)</span>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="pr_switch_wrap">
										<div class="product_color_switch">
											<span class="active" style="background-color: #333333"></span>
											<span style="background-color: #A92534"></span>
											<span style="background-color: #B9C2DF"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="product">
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('assets/images/product_img5.jpg') !!}" alt="product_img5">
									</a>
									<div class="product_action_box">
										<ul class="list_none pr_action_btn">
											<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
											<li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
											<li><a href="//bestwebcreator.com/shopping-zone/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
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
									<div class="rating_wrap">
										<div class="rating">
											<div class="product_rate" style="width:80%"></div>
										</div>
										<span class="rating_num">(21)</span>
									</div>
									<div class="pr_desc">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
									</div>
									<div class="pr_switch_wrap">
										<div class="product_color_switch">
											<span class="active" style="background-color: #87554B"></span>
											<span style="background-color: #333333"></span>
											<span style="background-color: #5FB7D4"></span>
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
@endsection
