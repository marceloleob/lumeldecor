@extends('admin.layouts.forms')

@section('icon', 'fas fa-tags')
@section('title', 'Cores do Produto')
@section('subheading', 'Formulário para cadastrar as informações referentes às cores do produto.')

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => $page . '.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form', 'files' => true]) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<ul class="forms-wizard mb-3">
							<li class="nav-item nav-product">
								<a href="{!! route('product.edit', $productSize->product->id) !!}" class="nav-link"><em><i class="fas fa-cubes"></i></em><span>Informações do Produto</span></a>
							</li>
							<li class="nav-item nav-product">
								<a href="{!! route('product-size.create', $productSize->product->id) !!}" class="nav-link"><em><i class="fas fa-cubes"></i></em><span>Informações do Produto</span></a>
							</li>
							<li class="nav-item nav-product active">
								<span class="nav-link"><em><i class="fas fa-tags"></i></em><span>Cor(es) do Produto</span></span>
							</li>
						</ul>

						<div class="row mb-4">
							<div class="col-md-12 d-flex px-3 py-2 my-2">
								<div class="product-title">{!! $productSize->product->name !!} - {!! $productSize->size !!}</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('colors', 'Tons deste Item (máx.: 3 tons)', ['class' => 'required']) !!}
									<select class="form-control selectpicker select-colors multiselect" id="colors[]" name="colors[]" multiple data-max-options="3" title="Selecione">
										@foreach ($optionstone as $tone)
											<option value="{!! $tone->id !!}" data-content="<span class='badge' style='background-color: {!! $tone->hexa !!}'>&nbsp;</span> &nbsp; {!! $tone->color !!} - {!! $tone->name !!}"></option>
										@endforeach
									</select>
									{!! Form::notification('colors', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('supplier_id', 'Fornecedor', ['class' => 'required']) !!}
									{!! Form::select('supplier_id', $optionssupplier, old('supplier_id', ($data->supplier_id ?? null)), ['class' => 'form-control selectpicker', 'id' => 'supplier_id', 'title' => 'Selecione']) !!}
									{!! Form::notification('supplier_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('theme', 'Temas relacionados') !!}
									{!! Form::select('themes[]', $optionstheme, old('themes'), ['class' => 'form-control selectpicker multiselect', 'id' => 'themes', 'multiple', ' data-selected-text-format' => 'count > 3', 'title' => 'Selecione']) !!}
									{!! Form::notification('themes', $errors) !!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-4">
										<div class="position-relative form-group">
											{!! Form::label('s_price', 'Preço no Site', ['class' => 'required']) !!}
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
												{!! Form::text('s_price', old('s_price', ($data->s_price ?? '')), ['class' => 'form-control decimal', 'id' => 's_price']) !!}
											</div>
											{!! Form::notification('s_price', $errors) !!}
										</div>
										<div class="position-relative form-group">
											{!! Form::label('p_price', 'Preço no Fornecedor', ['class' => 'required']) !!}
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
												{!! Form::text('p_price', old('p_price', ($data->p_price ?? '')), ['class' => 'form-control decimal', 'id' => 'p_price']) !!}
											</div>
											{!! Form::notification('p_price', $errors) !!}
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-row">
											<div class="col-md-6">
												<div class="position-relative form-group">
													{!! Form::label('amount', 'Quantidade', ['class' => 'required']) !!}
													{!! Form::number('amount', old('amount'), ['class' => 'form-control']) !!}
													{!! Form::notification('amount', $errors) !!}
												</div>
											</div>
										</div>
										<div class="position-relative form-group">
											<div class="profit-margin p1 px-2 pt-4">
												{!! ($data->profit ?? '') !!}
											</div>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-12">
										<div class="position-relative form-group item">
											<ul class="button-checkbox">
												<li>
													{!! Form::checkbox('launch', '1', (old('launch') ? true : false), ['id' => 'launch', 'class' => 'hide checks']) !!}
													{!! Form::label('launch', 'Esta cor é um lançamento') !!}
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<h5 class="card-title">Foto do Produto</h5>
						<div class="row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('picture', 'Tamanho ideal da foto é de 810px (largura) X 900px (altura)', ['class' => 'required']) !!}
									{!! Form::file('picture', ['class' => 'form-control custom-file-input', 'id' => 'picture_file']) !!}
									{!! Form::label('picture_file', 'Clique aqui para selecionar uma foto', ['class' => 'custom-file-label']) !!}
									{!! Form::notification('picture', $errors) !!}
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="main-card mb-3 card">
					<div class="card-button">
						{!! Form::hidden('product_id', $productSize->product->id, ['id' => 'product_id']) !!}
						{!! Form::hidden('product_size_id', $productSize->id, ['id' => 'product_size_id']) !!}
						{!! Form::buttons('product-size.create', null, ['back-show' => true, 'cancel-link-params' => $productSize->product->id]) !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	@include('admin.pages.item-list')

@endsection
