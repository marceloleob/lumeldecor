@extends('site.layouts.pages')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{!! route('product.show', [session('module'), session('search')]) !!}">{!! implode(': ', $bread) !!}</a></li>
<li class="breadcrumb-item active">Detalhes do Produto</li>
@endsection

@section('content')
	{{-- START SECTION DETAIL --}}
	<div class="section pt_50">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					{!! Form::boxNotification($errors) !!}
				</div>
			</div>
			<div class="row">
				{{-- PICTURES --}}
				<div class="col-lg-6 col-md-6 mb-4 mb-md-0">
					<div class="product-image vertical_gallery">
						<div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
							{{-- THUMBNAILS --}}
							@foreach ($item->pictures as $key => $picture)
								<div class="item">
									<a href="#" class="product_gallery_item {!! ($key === 0) ? 'active' : '' !!}" data-image="{!! asset('storage/' . config('constants.PICTURES.STORAGE.REGULAR') . '/' . $picture->name) !!}" data-zoom-image="{!! asset('storage/' . config('constants.PICTURES.STORAGE.BIGGER') . '/' . $picture->name) !!}">
										<img src="{!! asset('storage/' . config('constants.PICTURES.STORAGE.SMALLER') . '/' . $picture->name) !!}" alt="{!! $item->product->name !!} - {!! $item->productSize->size !!}" />
									</a>
								</div>
							@endforeach
							{{-- THUMBNAILS --}}
						</div>
						{{-- REGULAR --}}
						<div class="product_img_box">
							<img id="product_img" src="{!! asset('storage/' . config('constants.PICTURES.STORAGE.REGULAR') . '/' . $item->pictures[0]->name) !!}" alt="{!! $item->product->name !!} - {!! $item->productSize->size !!}" data-zoom-image="{!! asset('storage/' . config('constants.PICTURES.STORAGE.BIGGER') . '/' . $item->pictures[0]->name) !!}" />
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
						<div class="product_description mb-3">
							<h4 class="product_title mb-3">
								{!! $item->product->name !!} - {!! $item->productSize->size !!}
							</h4>
							<div class="price_rating mb-4">
								<div class="product_price">
									<span class="price">R$ {!! $item->sPriceFormatted !!}</span>
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
							<div class="product_sort_info">
								<ul>
									<li><i class="linearicons-shield-check"></i> Compre com segurança.</li>
									<li><i class="linearicons-store"></i> Se preferir, pode retirar o produto em nossa loja.</li>
								</ul>
							</div>
							<div class="pr_switch_wrap">
								<span class="switch_lable">Cores:</span>
								<div class="product_color_switch">
									@foreach ($colors as $colorItem)
										<a href="{!! route('product.detail', $colorItem->slug) !!}">
											<span style="{!! $colorItem->background !!}" {!! $colorItem->active !!} data-toggle="tooltip" data-placement="top" data-original-title="{!! $colorItem->tooltip !!}"></span>
										</a>
									@endforeach
								</div>
							</div>
							<div class="pr_switch_wrap">
								<span class="switch_lable">Tamanhos:</span>
								<div class="product_size_switch">
									@foreach ($sizes as $size)
										<a href="{!! route('product.detail', $size->items[0]->slug) !!}">
											<span {!! $size->active !!}>{!! $size->size !!}</span>
										</a>
									@endforeach
								</div>
							</div>
						</div>

						{!! Form::open(['id' => 'form-shop', 'route' => 'shopcart.add', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
							<hr />
							<div class="cart_extra">
								<div class="cart-product-quantity">
									<div class="quantity">
										{!! Form::button('-', ['type' => 'button', 'class' => 'minus']) !!}
										{!! Form::text('quantity', '1', ['id' => 'quantity', 'class' => 'qty', 'size' => '4']) !!}
										{!! Form::button('+', ['type' => 'button', 'class' => 'plus']) !!}
									</div>
								</div>
								<div class="cart_btn">
									{!! Form::hidden('slug', $item->slug) !!}
									{!! Form::button('<i class="fas fa-cart-plus"></i> Comprar', ['type' => 'submit', 'class' => 'btn btn-fill-out btn-addtocart']) !!}
									<a class="add_wishlist" href="javascript:Void(0);" data-href="{!! route('whishlist') !!}"><i class="icon-heart px-2"></i></a> Favoritos
								</div>
							</div>
							<hr />
						{!! Form::close() !!}

						{{-- {!! Form::open(['id' => 'form-zipcode', 'method' => 'GET']) !!} --}}
							<div class="shipping-price mb-2">
								<span>CEP:</span>
								{!! Form::text('zipcode', old('zipcode'), ['class' => 'zipcode mx-2 zipOnly', 'id' => 'zipcode', 'size' => '10', 'maxlength' => '9']) !!}
								{!! Form::button('<i class="fas fa-shipping-fast"></i> Calcular Frete', ['class' => 'btn btn-line-fill btn-sm ml-3 btn-shipping']) !!}
								{!! Form::hidden('item', $item->id, ['id' => 'item']) !!}
							</div>
						{{-- {!! Form::close() !!} --}}

						<div class="shipping-result"></div>
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
										<td width="15%">Código</td><td width="85%">{!! $item->sku !!}</td>
									</tr>
									<tr>
										<td>Nacionalidade</td><td>{!! $item->nationality !!}</td>
									</tr>
									<tr>
										<td>Material</td><td>{!! $item->product->material->name !!}</td>
									</tr>
									<tr>
										<td>Categoria</td><td>{!! $item->product->category->name !!}</td>
									</tr>
									@if (!empty($item->allThemes))
									<tr>
										<td>Temas</td><td>{!! $item->allThemes !!}</td>
									</tr>
									@endif
									<tr>
										<td>Cor</td><td>{!! $item->tooltip !!}</td>
									</tr>
									<tr>
										<td>&nbsp;</td><td><i class="linearicons-magic-wand pr-2 text_default"></i> A cor deste produto pode variar dependendo do ajuste do seu monitor.</td>
									</tr>
								</table>
							</div>
							<div class="tab-pane fade" id="dimensions" role="tabpanel" aria-labelledby="dimensions-tab">
								<table class="table table-bordered">
									<tr>
										<td width="15%">Tamanho</td><td width="85%">{!! $item->productSize->size !!}</td>
									</tr>
									<tr>
										<td>Peso</td><td>{!! $item->productSize->weightFormatted !!} Kg</td>
									</tr>
									<tr>
										<td>{!! ($item->productSize->shape === 'Q') ? 'Comprimento' : 'Diâmetro' !!}</td><td>{!! $item->productSize->proLengthFormatted !!} cm</td>
									</tr>
									@if ($item->productSize->shape === 'Q')
									<tr>
										<td>Largura</td><td>{!! $item->productSize->proWidthFormatted !!} cm</td>
									</tr>
									@endif
									<tr>
										<td>Altura</td><td>{!! $item->productSize->proHeightFormatted !!} cm</td>
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
					<div class="large_divider"></div>
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
	{{-- END SECTION DETAIL --}}
@endsection
