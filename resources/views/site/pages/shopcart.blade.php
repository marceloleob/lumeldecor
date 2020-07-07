@extends('site.layouts.pages')

@section('breadcrumb')
<li class="breadcrumb-item active">Meu carrinho</li>
@endsection

@section('content')
	{{-- START SECTION SHOP --}}
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="table-responsive shop_cart_table">
						<table class="table">
							<thead>
								<tr>
									<td class="title" width="10%">&nbsp;</td>
									<td class="title" width="43%">Produto</td>
									<td class="title" width="12%">Preço unitário</td>
									<td class="title" width="15%">Quantidade</td>
									<td class="title" width="12%">Subtotal</td>
									<td class="title" width="8%">&nbsp;</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="product-thumbnail"><img src="{!! asset('images/help/product_img1.jpg') !!}" alt="product1"></td>
									<td class="product-name" data-title="Product">Blue Dress For Woman</td>
									<td class="product-price" data-title="Price">R$ 145,00</td>
									<td class="product-quantity" data-title="Quantity">
										<div class="quantity">
											<input type="button" value="-" class="minus">
											<input type="text" name="quantity" value="2" title="Qty" class="qty" size="4">
											<input type="button" value="+" class="plus">
										</div>
									</td>
									<td class="product-subtotal" data-title="Total">R$ 9.999,00</td>
									<td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="6" class="px-0">
										<div class="row no-gutters align-items-center">

											<div class="col-lg-4 col-md-6 mb-3 mb-md-0">
												<div class="coupon field_form input-group">
													<input type="text" value="" class="form-control form-control-sm" placeholder="Cupom de desconto">
													<div class="input-group-append">
														<button class="btn btn-fill-out btn-sm" type="submit">Aplicar</button>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-md-6 text-left text-md-right">
												<button class="btn btn-line-fill btn-sm" type="submit">Atualizar carrinho</button>
											</div>
										</div>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="medium_divider"></div>
					<div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
					<div class="medium_divider"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="heading_s1 mb-3">
						<h6>Opções de frete</h6>
					</div>
					{!! Form::open(['id' => 'form-zipcode', 'method' => 'GET', 'class' => 'field_form shipping_calculator']) !!}
						<div class="shipping-price mb-2">
							<span>CEP:</span>
							{!! Form::text('zipcode', old('zipcode'), ['class' => 'form-control zipcode mx-2 zipOnly', 'id' => 'zipcode', 'size' => '10', 'maxlength' => '9']) !!}
							{!! Form::button('<i class="fas fa-shipping-fast"></i> Calcular Frete', ['class' => 'btn btn-line-fill btn-sm ml-3 btn-calculator']) !!}
							{!! Form::hidden('item', '', ['id' => 'item']) !!}
						</div>
					{!! Form::close() !!}

					{{-- <form class="field_form shipping_calculator">
						<div class="form-row">
							<div class="form-group col-lg-12">
								<div class="custom_select">
									<select class="form-control">
										<option value="">Choose a option...</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-lg-6">
								<input required="required" placeholder="State / Country" class="form-control" name="name" type="text">
							</div>
							<div class="form-group col-lg-6">
								<input required="required" placeholder="PostCode / ZIP" class="form-control" name="name" type="text">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-lg-12">
								<button class="btn btn-fill-line" type="submit">Update Totals</button>
							</div>
						</div>
					</form> --}}

				</div>
				<div class="col-md-6">
					<div class="border p-3 p-md-4">
						<div class="heading_s1 mb-3">
							<h6>Cart Totals</h6>
						</div>
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td class="cart_total_label">Cart Subtotal</td>
										<td class="cart_total_amount">$349.00</td>
									</tr>
									<tr>
										<td class="cart_total_label">Shipping</td>
										<td class="cart_total_amount">Free Shipping</td>
									</tr>
									<tr>
										<td class="cart_total_label">Total</td>
										<td class="cart_total_amount"><strong>$349.00</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
						<a href="#" class="btn btn-fill-out">Proceed To CheckOut</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- END SECTION SHOP --}}
@endsection
