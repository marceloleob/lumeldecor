@extends('site.layouts.pages')

{{-- @section('facebook')
<meta property="og:url"         content="{!! route('product.detail', [$type, $current, $item->product->slug, $item->productSize->size, $item->code]) !!}" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="{!! $title !!}" />
<meta property="og:description" content="Your description" />
<meta property="og:image"       content="{!! asset('storage/' . config('constants.PICTURES_PATHS.REGULAR') . '/' . $item->picture) !!}" />
@endsection --}}

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{!! route('product.show', [$type, $current]) !!}">Lista dos Produtos</a></li>
<li class="breadcrumb-item active">Detalhes do Produto</li>
@endsection

@section('js-custom')
{!! Html::script('js/forms/jquery.validate.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.masks.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/site/pages.js', ['defer' => 'defer']) !!}
{{-- <div id="fb-root"></div> --}}
{{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v7.0&appId=2921606597937895&autoLogAppEvents=1" nonce="gxJZNA8c"></script> --}}
@stop

@section('content')
	<div class="section">
		<div class="container">
			<div class="row">
				{{-- PICTURES --}}
				<div class="col-lg-6 col-md-6 mb-4 mb-md-0">
					<div class="product-image vertical_gallery">
						<div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
							{{-- THUMBNAILS --}}
							<div class="item">
								<a href="#" class="product_gallery_item active" data-image="{!! asset('storage/' . config('constants.PICTURES_PATHS.REGULAR') . '/' . $item->picture) !!}" data-zoom-image="{!! asset('storage/' . config('constants.PICTURES_PATHS.BIGGER') . '/' . $item->picture) !!}">
									<img src="{!! asset('storage/' . config('constants.PICTURES_PATHS.THUMBNAIL') . '/' . $item->picture) !!}" alt="{!! $item->product->name !!} - {!! $item->productSize->size !!}" />
								</a>
							</div>
							{{-- THUMBNAILS --}}
						</div>
						{{-- REGULAR --}}
						<div class="product_img_box">
							<img id="product_img" src="{!! asset('storage/' . config('constants.PICTURES_PATHS.REGULAR') . '/' . $item->picture) !!}" alt="{!! $item->product->name !!} - {!! $item->productSize->size !!}" data-zoom-image="{!! asset('storage/' . config('constants.PICTURES_PATHS.BIGGER') . '/' . $item->picture) !!}" />
							<a href="#" class="product_img_zoom" title="{!! $item->product->name !!} - {!! $item->productSize->size !!}">
								<span class="linearicons-zoom-in"></span>
							</a>
						</div>
						{{-- REGULAR --}}
					</div>
				</div>
				{{-- PICTURES --}}

				<div class="col-lg-6 col-md-6">
					<div class="pr_detail">
						<div class="product_description mb-4">
							<h4 class="product_title mb-3">
								<a href="{!! route('product.detail', [$type, $current, $item->product->slug, $item->productSize->size, $item->code]) !!}">{!! $item->product->name !!} - {!! $item->productSize->size !!}</a>
							</h4>
							<div class="price_rating mb-4">
								<div class="product_price">
									<span class="price">R$ {!! $item->s_price !!}</span>
									{{-- <del>R$ 25.00</del> --}}
									<div class="on_sale">
										{{-- <span>35% Off</span> --}}
									</div>
								</div>
								@if ($item->launch)
									<div class="product_launch">
										<span class="badge badge-pill"><i class="fas fa-rocket pr-1"></i> Lançamento</span>
									</div>
								@endif
							</div>
							<div class="pr_switch_wrap">
								<span class="switch_lable">Cores:</span>
								<div class="product_color_switch">
									@foreach ($colors as $colorItem)
										<a href="{!! route('product.detail', [$type, $current, $colorItem->product->slug, $colorItem->productSize->size, $colorItem->code]) !!}">
											<span style="{!! $colorItem->background !!}" {!! $colorItem->active !!} data-toggle="tooltip" data-placement="top" data-original-title="{!! $colorItem->tooltip !!}"></span>
										</a>
									@endforeach
								</div>
							</div>
							<div class="pr_switch_wrap">
								<span class="switch_lable">Tamanhos:</span>
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
									<input type="button" value="-" class="minus" />
									<input type="text" name="quantity" value="1" title="Qtde" class="qty" size="4" />
									<input type="button" value="+" class="plus" />
								</div>
							</div>
							<div class="cart_btn">
								<button class="btn btn-fill-out btn-addtocart" type="button"><i class="fas fa-cart-plus"></i> Comprar</button>
								<a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
							</div>
						</div>
						<hr />

						{!! Form::open(['id' => 'form-zipcode', 'method' => 'POST']) !!}
							<div class="shipping-price mb-4">
								<span>CEP:</span>
								{!! Form::text('zipcode', old('zipcode'), ['class' => 'zipcode mx-2 numbersOnly', 'size' => '10', 'maxlength' => '9']) !!}
								{{-- <span>-</span> --}}
								{{-- {!! Form::text('code', old('code'), ['class' => 'zipcode mx-2', 'size' => '4', 'maxlength' => '3']) !!} --}}
								{!! Form::button('<i class="fas fa-shipping-fast"></i> Calcular Frete', ['class' => 'btn btn-line-fill btn-sm ml-3']) !!}
							</div>
						{!! Form::close() !!}

						<div class="shipping-result mb-4">
							&nbsp;
						</div>

						<div class="product_sort_info">
							<ul>
								<li><i class="linearicons-shield-check"></i> Compre com segurança.</li>
								<li><i class="linearicons-store"></i> Se preferir, pode retirar o produto em nossa loja.</li>
								<li><i class="linearicons-magic-wand"></i> A cor deste produto pode variar dependendo do ajuste do seu monitor.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="medium_divider clearfix"></div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="tab-style3">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Descrição</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="infos-tab" data-toggle="tab" href="#infos" role="tab" aria-controls="infos" aria-selected="false">Informações</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="dimensions-tab" data-toggle="tab" href="#dimensions" role="tab" aria-controls="dimensions" aria-selected="false">Dimensões</a>
							</li>
						</ul>
						<div class="tab-content shop_info_tab">
							<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
								{!! $item->product->description !!}
							</div>
							<div class="tab-pane fade" id="infos" role="tabpanel" aria-labelledby="infos-tab">
								<table class="table table-bordered">
									<tr>
										<td width="15%">Código</td><td width="85%">{!! $item->code !!}</td>
									</tr>
									<tr>
										<td>Material</td><td>{!! $item->product->material->name !!}</td>
									</tr>
									<tr>
										<td>Categoria</td><td>{!! $item->product->category->name !!}</td>
									</tr>
									<tr>
										<td>Cor</td><td>{!! $item->tooltip !!}</td>
									</tr>
									<tr>
										<td>&nbsp;</td><td>*A cor deste produto pode variar dependendo do ajuste do seu monitor.</td>
									</tr>
								</table>
							</div>
							<div class="tab-pane fade" id="dimensions" role="tabpanel" aria-labelledby="dimensions-tab">
								<table class="table table-bordered">
									<tr>
										<td width="15%">Tamanho</td><td width="85%">{!! $item->productSize->size !!}</td>
									</tr>
									<tr>
										<td>Peso</td><td>{!! $item->productSize->weight !!} Kg</td>
									</tr>
									<tr>
										<td>{!! ($item->productSize->shape === 'Q') ? 'Comprimento' : 'Diâmetro' !!}</td><td>{!! $item->productSize->pro_length !!} cm</td>
									</tr>
									@if ($item->productSize->shape === 'Q')
									<tr>
										<td>Largura</td><td>{!! $item->productSize->pro_width !!} cm</td>
									</tr>
									@endif
									<tr>
										<td>Altura</td><td>{!! $item->productSize->pro_height !!} cm</td>
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
						<h3>Produtos Relacionados</h3>
					</div>
					<div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
						<div class="item">
							<div class="product">
								<div class="product_img">
									<a href="shop-product-detail.html">
										<img src="{!! asset('images/help/product_img1.jpg') !!}" alt="product_img1">
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
											<div class="product_rate" style="width:85%"></div>
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
										<img src="{!! asset('images/help/product_img2.jpg') !!}" alt="product_img2">
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
										<img src="{!! asset('images/help/product_img3.jpg') !!}" alt="product_img3">
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
										<img src="{!! asset('images/help/product_img4.jpg') !!}" alt="product_img4">
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
										<img src="{!! asset('images/help/product_img5.jpg') !!}" alt="product_img5">
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
											<div class="product_rate" style="width:85%"></div>
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
