@extends('admin.layouts.app')

@section('js-custom')
{!! Html::script('js/forms/jquery.validate.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.masks.min.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.masks.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/admin/pages.js', ['defer' => 'defer']) !!}
@stop

@section('content')

<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="fas fa-cubes icon-gradient bg-plum-plate"></i>
			</div>
			<div>
				Produtos
				<div class="page-title-subheading">Formulário para cadastrar os produtos.</div>
			</div>
		</div>
		<div class="page-title-actions">
			<div class="d-inline-block dropdown">
				<a href="{!! route('product.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
					<span class="btn-icon-wrapper pr-2 opacity-9"><i
							class="fas fa-arrow-circle-left fa-w-20"></i></span>
					Voltar
				</a>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		{!! Form::boxNotification($errors) !!}
	</div>
</div>

{!! Form::open(['id' => 'form-product', 'route' => 'product.store', 'method' => 'POST', 'role' => 'form', 'class' =>
'form']) !!}
<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card card-basic-info">
			<div class="row">
				<div class="col-md-6">
					<div class="card-body">
						<h5 class="card-title">Informações Básicas</h5>
						<div class="row">
							<div class="col-md-12">
								<div class="position-relative form-group">
									{!! Form::label('material_id', 'Material*') !!}
									{!! Form::select('material_id', $optionsmaterial, old('material_id',
									$data->material_id), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('material_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('category_id', 'Categoria*') !!}
									{!! Form::select('category_id', $optionscategory, old('category_id',
									$data->category_id), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('category_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('name', 'Nome do Produto*') !!}
									{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text'])
									!!}
									{!! Form::notification('name', $errors) !!}
								</div>
								<div class="position-relative form-group featured">
									<ul class="button-checkbox">
										<li>
											{!! Form::checkbox('featured', 1, (old('featured', $data->featured) ? true :
											false), ['id' => 'featured', 'class' => 'hide ']) !!}
											{!! Form::label('featured', 'Destacar este produto no Site.') !!}
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card-body">
						<h5 class="card-title">Detalhes</h5>
						<div class="row">
							<div class="col-md-12">
								<div class="position-relative form-group">
									{!! Form::label('description', 'Descrição') !!}
									{!! Form::textarea('description', old('description', $data->description), ['class'
									=> 'form-control textarea', 'placeholder' => 'Detalhes do produto', 'rows' => '6'])
									!!}
									{!! Form::notification('description', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('hashtag', 'Hashtags') !!}
									{!! Form::textarea('hashtag', old('hashtag', $data->hashtag), ['class' =>
									'form-control textarea', 'placeholder' => 'Adicione as hashtags referentes ao
									produto', 'rows' => '5']) !!}
									{!! Form::notification('hashtag', $errors) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row card-size">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Dimensões / Preço</h5>
				<div class="form-row">
					<div class="col-md-5">
						<div class="form-row">
							<div class="col-md-7">
								<div class="position-relative form-group">
									{!! Form::label('size[]', 'Tamanho*') !!}
									{!! Form::selectSize('size[]', old('size[]'), ['class' => 'form-control
									selectpicker']) !!}
									{!! Form::notification('size[]', $errors) !!}
								</div>
							</div>
							<div class="col-md-5">
								<div class="position-relative form-group">
									{!! Form::label('weight[]', 'Peso*') !!}
									<div class="input-group">
										{!! Form::text('weight[]', old('weight[]'), ['class' => 'form-control
										decimalOnly']) !!}
										<div class="input-group-append"><span class="input-group-text">kg</span></div>
									</div>
									{!! Form::notification('weight[]', $errors) !!}
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-12">
								<div class="position-relative form-group">
									{!! Form::label('size[]', 'Fornecedor*') !!}
									{!! Form::selectSize('size[]', old('size[]'), ['class' => 'form-control
									selectpicker']) !!}
									{!! Form::notification('size[]', $errors) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="position-relative form-group">
							{!! Form::label('price[]', 'Preço no Site*') !!}
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
								{!! Form::number('price[]', old('price[]'), ['class' => 'form-control text']) !!}
							</div>
							{!! Form::notification('price[]', $errors) !!}
						</div>
						<div class="position-relative form-group">
							{!! Form::label('price[]', 'Preço no Fornecedor*') !!}
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
								{!! Form::number('price[]', old('price[]'), ['class' => 'form-control text']) !!}
							</div>
							{!! Form::notification('price[]', $errors) !!}
						</div>
					</div>
					<div class="col-md-2">
						<div class="position-relative form-group">
							{!! Form::label('lenght[]', 'Comprimento*') !!}
							<div class="input-group">
								{!! Form::number('lenght[]', old('lenght[]'), ['class' => 'form-control text']) !!}
								<div class="input-group-append"><span class="input-group-text">cm</span></div>
							</div>
							{!! Form::notification('lenght[]', $errors) !!}
						</div>
						<div class="position-relative form-group">
							{!! Form::label('width[]', 'Largura*') !!}
							<div class="input-group">
								{!! Form::number('width[]', old('width[]'), ['class' => 'form-control text']) !!}
								<div class="input-group-append"><span class="input-group-text">cm</span></div>
							</div>
							{!! Form::notification('width[]', $errors) !!}
						</div>
						<div class="position-relative form-group">
							{!! Form::label('height[]', 'Altura*') !!}
							<div class="input-group">
								{!! Form::number('height[]', old('height[]'), ['class' => 'form-control text']) !!}
								<div class="input-group-append"><span class="input-group-text">cm</span></div>
							</div>
							{!! Form::notification('height[]', $errors) !!}
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-box-example p-2">
							<img src="{!! asset('images/box.jpeg') !!}" alt="" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card-piece mt-3 mb-3">
							<div class="card-body">
								<h5 class="card-title">Informações das Peças</h5>
								<div class="form-row row-piece">
									<div class="col-md-2">
										<div class="position-relative form-group col-select">
											{!! Form::label('color[][]', 'Cor*') !!}
											{!! Form::select('color[][]', $optionscolor, old('color[][]'), ['class' =>
											'form-control selectpicker select-color']) !!}
											{!! Form::notification('color[][]', $errors) !!}
										</div>
									</div>
									<div class="col-md-2">
										<div class="position-relative form-group">
											{!! Form::label('amount[][]', 'Quantidade*') !!}
											{!! Form::number('amount[][]', old('amount[][]'), ['class' => 'form-control
											text']) !!}
											{!! Form::notification('amount[][]', $errors) !!}
										</div>
									</div>
									<div class="col-md-2">
										<div class="position-relative form-group">
											{!! Form::label('photo[][]', 'Foto desta peça*') !!}
											{!! Form::file('photo[][]', ['class' => 'form-control custom-file-input',
											'id' => 'photo-file[][]']) !!}
											{!! Form::label('photo-file[][]', '&nbsp;', ['class' =>
											'custom-file-label']) !!}
											{!! Form::notification('photo[][]', $errors) !!}
										</div>
									</div>
									<div class="col-md-3">
										<div class="position-relative form-group">
											{!! Form::label('theme[][]', 'Tema*') !!}
											{!! Form::select('theme[][]', $optionscolor, old('theme[][]'), ['class' =>
											'form-control selectpicker select-theme']) !!}
											{!! Form::notification('theme[][]', $errors) !!}
										</div>
									</div>
									<div class="col-md-2">
										<div class="position-relative form-group launch">
											<ul class="button-checkbox">
												<li>
													{!! Form::checkbox('launch[][]', 1, (old('launch[][]') ? true :
													false), ['id' => 'checkbox-launch-0', 'class' => 'hide checks']) !!}
													{!! Form::label('checkbox-launch-0', 'Lançamento') !!}
												</li>
											</ul>
										</div>
									</div>
									<div class="col-md-1">
										<div class="btn-action">
											<a href="#"
												class="mb-2 btn-transition btn btn-outline-alternate btn-block add-color">
												<span class="btn-icon-wrapper opacity-9 mr-1"><i
														class="fas fa-plus-circle"></i></span> Cores
											</a>
											<a href="#"
												class="mb-2 btn-transition btn btn-outline-danger btn-block remove-color pr-3 hide">
												<span class="btn-icon-wrapper opacity-9 mr-1"><i
														class="fas fa-trash-alt"></i></span> Cor
											</a>
										</div>
									</div>
								</div>
								{!! Form::hidden('count-color', '0', ['id' => 'count-color']) !!}
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="card-button-add mt-3">
							<a href="#" class="mb-2 mr-2 btn btn-info">
								<span class="btn-icon-wrapper pr-2 opacity-9"><i
										class="fas fa-plus-circle fa-w-10"></i></span> Adicionar outro tamanho
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{!! Form::text('count-piece', '0', ['id' => 'count-piece']) !!}
</div>

<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-body">

				@if (isset($data->id))
				{!! Form::hidden('id', $data->id, ['id' => 'id']) !!}
				@endif
				{!! Form::hidden('count-size[]', '0', ['id' => 'count-size[]']) !!}
				{!! Form::button('<i class="fas fa-cloud-upload-alt fa-w-10"></i> &nbsp; Salvar &nbsp; &nbsp;', ['type'
				=> 'submit', 'class' => 'btn btn-success mr-4']) !!}
				<a href="{!! route('product.list') !!}" class="btn-transition btn btn-outline-focus">
					<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-times-circle fa-w-10"></i></span>
					Cancelar
				</a>

			</div>
		</div>
	</div>
</div>







{{-- <div class="position-relative form-group">
		{!! Form::label('supplier_id', 'Fornecedor*') !!}
		{!! Form::select('supplier_id', $optionssupplier, old('supplier_id', $data->supplier_id), ['class' => 'form-control selectpicker']) !!}
		{!! Form::notification('supplier_id', $errors) !!}
	</div> --}}


{{-- <div class="col-md-4">
		<div class="position-relative form-group">
			{!! Form::label('price_supp', 'Preço no Fornecedor*') !!}
			<div class="input-group">
				<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
				{!! Form::number('price_supp', old('price_supp', $data->price_supp), ['class' => 'form-control text']) !!}
			</div>
			{!! Form::notification('price_supp', $errors) !!}
		</div>
	</div> --}}






{!! Form::close() !!}

@endsection