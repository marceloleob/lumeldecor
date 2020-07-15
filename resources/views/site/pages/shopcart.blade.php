@extends('site.layouts.pages')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{!! route('product.show', [session('module'), session('search')]) !!}">{!! implode(': ', $bread) !!}</a></li>
<li class="breadcrumb-item active">Meu carrinho</li>
@endsection

@section('content')
	{{-- START SECTION SHOP --}}
	<div class="section pt_50">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					{!! Form::boxNotification($errors) !!}
				</div>
			</div>
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
								@foreach ($items as $item)
								<tr>
									<td class="product-thumbnail"><img src="{!! asset('storage/' . config('constants.PICTURES.STORAGE.SMALLER') . '/' . $item->pictures[0]->name) !!}" alt="{!! $item->product->name !!} - {!! $item->productSize->size !!}" /></td>
									<td class="product-name" data-title="Product">{!! $item->product->name !!} - {!! $item->productSize->size !!}</td>
									<td class="product-price" data-title="Price">R$ {!! $item->sPriceFormatted !!}</td>
									<td class="product-quantity" data-title="Quantity">
										<div class="quantity">
											{!! Form::button('-', ['type' => 'button', 'class' => 'minus']) !!}
											{!! Form::text('quantity', $item->shopCart->quantity, ['class' => 'qty', 'size' => '4']) !!}
											{!! Form::button('+', ['type' => 'button', 'class' => 'plus']) !!}
										</div>
									</td>
									<td class="product-subtotal" data-title="Total">R$ {!! $item->shopCart->subTotalFormatted !!}</td>
									<td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="medium_divider"></div>
					<div class="divider center_icon"><i class="ti-shopping-cart-full text_default"></i></div>
					<div class="medium_divider"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="border p-3 p-md-4">
						<div class="heading_s1 mb-3">
							<h6>Escolher Frete</h6>
						</div>
						{!! Form::open(['id' => 'form-zipcode', 'method' => 'GET', 'class' => 'field_form shipping_calculator']) !!}
							<div class="form-row">
								<div class="col-lg-6 form-group">
									{!! Form::text('zipcode', old('zipcode'), ['class' => 'form-control zipcode mx-2 zipOnly', 'id' => 'zipcode', 'size' => '10', 'maxlength' => '9']) !!}
								</div>
								<div class="col-lg-6 form-group">
									{!! Form::button('<i class="fas fa-shipping-fast"></i> Calcular Frete', ['class' => 'btn btn-line-fill btn-sm ml-3 btn-shipping-full']) !!}
								</div>
							</div>
							<div class="shipping-result"></div>
						{!! Form::close() !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="border p-3 p-md-4">
						<div class="heading_s1 mb-3">
							<h6>Total da Compra</h6>
						</div>
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td class="cart_total_label">Carrinho</td>
										<td class="cart_total_amount">R$ 320,00</td>
									</tr>
									<tr>
										<td class="cart_total_label">Frete</td>
										<td class="cart_total_amount">R$ 28,90</td>
									</tr>
									<tr>
										<td class="cart_total_label">Total</td>
										<td class="cart_total_amount"><strong>R$ 348,90</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="text-center">
							<a href="#" class="btn btn-fill-out">Concluir a Compra</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- END SECTION SHOP --}}
@endsection


{{-- <tfoot>
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
</tfoot> --}}
