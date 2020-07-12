@extends('admin.layouts.forms')

@section('icon', 'fas fa-tags')
@section('title', 'Cores do Produto')
@section('subheading', 'Formulário para editar as informações referentes à cor do produto.')

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => [$page . '.update', $data->id], 'method' => 'POST', 'role' => 'form', 'class' => 'form', 'files' => true]) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<ul class="forms-wizard mb-3">
							<li class="nav-item nav-product">
								<a href="{!! route('product.edit', $data->product->id) !!}" class="nav-link"><em><i class="fas fa-cubes"></i></em><span>Informações do Produto</span></a>
							</li>
							<li class="nav-item nav-product">
								<a href="{!! route('product-size.create', $data->product->id) !!}" class="nav-link"><em><i class="fas fa-ruler-combined"></i></em><span>Tamanho(s) do Produto</span></a>
							</li>
							<li class="nav-item nav-product active">
								<span class="nav-link"><em><i class="fas fa-tags"></i></em><span>Itens do Produto</span></span>
							</li>
						</ul>

						<div class="row mb-4">
							<div class="col-md-12 d-flex px-3 py-2 my-2">
								<div class="product-title">{!! $data->product->name !!} - {!! $data->productSize->size !!}</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('tones', 'Tons deste Item (máx.: 3 tons)', ['class' => 'required']) !!}
									<select class="form-control selectpicker multiselect" id="tones[]" name="tones[]" multiple data-max-options="3" title="Selecione">
										@foreach ($optionstone as $tone)
											<option value="{!! $tone->id !!}" data-content="<span class='badge' style='background-color: {!! $tone->hexa !!}'>&nbsp;</span> &nbsp; {!! $tone->color !!} - {!! $tone->name !!}" {!! in_array($tone->id, $data->tones) ? 'selected' : '' !!}></option>
										@endforeach
									</select>
									{!! Form::notification('tones', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('supplier_id', 'Fornecedor', ['class' => 'required']) !!}
									{!! Form::select('supplier_id', $optionssupplier, old('supplier_id', $data->supplier_id), ['class' => 'form-control selectpicker', 'id' => 'supplier_id', 'title' => 'Selecione']) !!}
									{!! Form::notification('supplier_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('theme', 'Temas relacionados') !!}
									{!! Form::select('themes[]', $optionstheme, old('themes', $data->themes), ['class' => 'form-control selectpicker multiselect', 'id' => 'themes', 'multiple', ' data-selected-text-format' => 'count > 3', 'title' => 'Selecione']) !!}
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
												{!! Form::text('s_price', old('s_price', $data->sPriceFormatted), ['class' => 'form-control decimal', 'id' => 's_price']) !!}
											</div>
											{!! Form::notification('s_price', $errors) !!}
										</div>
										<div class="position-relative form-group">
											{!! Form::label('p_price', 'Preço no Fornecedor', ['class' => 'required']) !!}
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
												{!! Form::text('p_price', old('p_price', $data->pPriceFormatted), ['class' => 'form-control decimal']) !!}
											</div>
											{!! Form::notification('p_price', $errors) !!}
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-row">
											<div class="col-md-6">
												<div class="position-relative form-group" data-toggle="tooltip" data-placement="top" data-original-title="Para editar a quantidade, você deve clicar na aba Estoques">
													{!! Form::label('amount_fake', 'Quantidade', ['class' => 'required']) !!}
													{!! Form::number('amount_fake', '', ['class' => 'form-control', 'readonly' => true]) !!}
													{!! Form::notification('amount_fake', $errors) !!}
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
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="position-relative form-group item">
									<ul class="button-checkbox">
										<li>
											{!! Form::checkbox('launch', '1', (old('launch', $data->launch) ? true : false), ['id' => 'launch', 'class' => 'hide checks']) !!}
											{!! Form::label('launch', 'Colocar este item como LANÇAMENTO na "Página Inicial" do site') !!}
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="position-relative form-group">
									{!! Form::switch('status', $data->status) !!}
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Fotos deste Item</h5>
						<div class="row row-pictures">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('pictures[0]', 'Foto 01', ['class' => 'required']) !!}
									{!! Form::file('pictures[0]', ['class' => 'form-control custom-file-input required-file-input', 'id' => 'picture_file[0]']) !!}
									{!! Form::label('picture_file[0]', 'Clique aqui para selecionar uma foto', ['class' => 'custom-file-label']) !!}
									{!! Form::notification('pictures[0]', $errors) !!}
									{!! Form::hidden('old_pictures[0]', $data->pictureName0) !!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="cards-picture">
									<div class="picture">
										<img src="{!! asset('storage/' . config('constants.PICTURES.STORAGE.SMALLER') . '/' . $data->pictureName0) !!}" alt="" />
									</div>
								</div>
							</div>
						</div>
						<div class="row row-pictures">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('pictures[1]', 'Foto 02') !!}
									{!! Form::file('pictures[1]', ['class' => 'form-control custom-file-input', 'id' => 'picture_file[1]']) !!}
									{!! Form::label('picture_file[1]', 'Clique aqui para selecionar uma foto', ['class' => 'custom-file-label']) !!}
									{!! Form::notification('pictures[1]', $errors) !!}
									{!! Form::hidden('old_pictures[1]', $data->pictureName1) !!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="cards-picture">
									<div class="picture">
										@if (isset($data->pictureName1))
										<img src="{!! asset('storage/' . config('constants.PICTURES.STORAGE.SMALLER') . '/' . $data->pictureName1) !!}" alt="" />
										@endif
									</div>
									@if (isset($data->pictureName1))
									<div class="remove">
										<a href="{!! route('item-picture.remove', $data->pictureName1) !!}" class="btn btn-transition btn-outline-danger"><i class="fas fa-ban pr-2"></i> Remover esta foto</a>
									</div>
									@endif
								</div>
							</div>
						</div>
						<div class="row row-pictures">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('pictures[2]', 'Foto 03') !!}
									{!! Form::file('pictures[2]', ['class' => 'form-control custom-file-input', 'id' => 'picture_file[2]']) !!}
									{!! Form::label('picture_file[2]', 'Clique aqui para selecionar uma foto', ['class' => 'custom-file-label']) !!}
									{!! Form::notification('pictures[2]', $errors) !!}
									{!! Form::hidden('old_pictures[2]', $data->pictureName2) !!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="cards-picture">
									<div class="picture">
										@if (isset($data->pictureName2))
										<img src="{!! asset('storage/' . config('constants.PICTURES.STORAGE.SMALLER') . '/' . $data->pictureName2) !!}" alt="" />
										@endif
									</div>
									@if (isset($data->pictureName2))
									<div class="remove">
										<a href="{!! route('item-picture.remove', $data->pictureName2) !!}" class="btn btn-transition btn-outline-danger"><i class="fas fa-ban pr-2"></i> Remover esta foto</a>
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="main-card mb-3 card">
					<div class="card-button">
						{!! Form::hidden('product_id', $data->product->id, ['id' => 'product_id']) !!}
						{!! Form::hidden('product_size_id', $data->productSize->id, ['id' => 'product_size_id']) !!}
						{!! Form::buttons('product-size.create', $data->id, ['back-show' => true, 'cancel-link-params' => $data->product->id]) !!}
						<a href="{!! route('item.create', [$data->product->id, $data->productSize->id]) !!}" class="btn-hover-shine btn btn-shadow btn-alternate pr-4 pl-4 float-right"><i class="fas fa-plus-circle fa-w-10 pr-2"></i> Cadastrar um item novo</a>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	@include('admin.pages.item-list')

@endsection
