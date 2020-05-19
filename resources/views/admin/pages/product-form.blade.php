@extends('admin.layouts.app')

@section('js-custom')
{!! Html::script('js/forms/jquery.validate.' . $locale . '.js', ['defer' => 'defer']) !!}
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
				<div class="page-title-subheading">Segunda parte do formulário para cadastrar os produtos.</div>
			</div>
		</div>
		<div class="page-title-actions">
			<div class="d-inline-block dropdown">
				<a href="{!! route('product.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
					<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-arrow-circle-left fa-w-20"></i></span>
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

<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card card-basic-info">
			<div class="row">
				<div class="col-md-6">
					<div class="card-body">
						<h5 class="card-title">Informações Básicas</h5>
						<div class="row">
							<div class="col-md-12">
								{!! $item['material'] !!} - {!! $item['category'] !!} - {!! $item['name'] !!} <br />
								Descrição: {!! $item['description'] !!} <br />
								Hashtags: {!! $item['hashtag'] !!} <br />
								Mostrar na Home do Site? @if ($item['featured'] === 1) Sim @else Não @endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{!! Form::open(['id' => 'form-product', 'route' => 'product.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form', 'files' => true]) !!}
<div class="row row-piece">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-body card-piece">
				<h5 class="card-title">Dimensões / Preço</h5>
				<div class="form-row">
					<div class="col-md-5">
						<div class="form-row">
							<div class="col-md-7">
								<div class="position-relative form-group">
									{!! Form::label('size', 'Tamanho', ['class' => 'required']) !!}
									{!! Form::selectSize('size', old('size', $data->size), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('size', $errors) !!}
								</div>
							</div>
							<div class="col-md-5">
								<div class="position-relative form-group">
									{!! Form::label('weight', 'Peso', ['class' => 'required']) !!}
									<div class="input-group">
										{!! Form::text('weight', old('weight', $data->weight), ['class' => 'form-control weight']) !!}
										<div class="input-group-append"><span class="input-group-text">kg</span></div>
									</div>
									{!! Form::notification('weight', $errors) !!}
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-12">
								<div class="position-relative form-group">
									{!! Form::label('supplier_id', 'Fornecedor', ['class' => 'required']) !!}
									{!! Form::select('supplier_id', $optionssupplier, old('supplier_id', $data->supplier_id), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('supplier_id', $errors) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="position-relative form-group">
							{!! Form::label('s_price', 'Preço no Site', ['class' => 'required']) !!}
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
								{!! Form::text('s_price', old('s_price', $data->s_price), ['class' => 'form-control decimal']) !!}
							</div>
							{!! Form::notification('price', $errors) !!}
						</div>
						<div class="position-relative form-group">
							{!! Form::label('p_price', 'Preço no Fornecedor', ['class' => 'required']) !!}
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
								{!! Form::text('p_price', old('p_price', $data->p_price), ['class' => 'form-control decimal']) !!}
							</div>
							{!! Form::notification('price', $errors) !!}
						</div>
					</div>
					<div class="col-md-2">
						<div class="position-relative form-group">
							{!! Form::label('lenght', 'Comprimento', ['class' => 'required']) !!}
							<div class="input-group">
								{!! Form::text('lenght', old('lenght', $data->lenght), ['class' => 'form-control decimal']) !!}
								<div class="input-group-append"><span class="input-group-text">cm</span></div>
							</div>
							{!! Form::notification('lenght', $errors) !!}
						</div>
						<div class="position-relative form-group">
							{!! Form::label('width', 'Largura', ['class' => 'required']) !!}
							<div class="input-group">
								{!! Form::text('width', old('width', $data->width), ['class' => 'form-control decimal']) !!}
								<div class="input-group-append"><span class="input-group-text">cm</span></div>
							</div>
							{!! Form::notification('width', $errors) !!}
						</div>
						<div class="position-relative form-group">
							{!! Form::label('height', 'Altura', ['class' => 'required']) !!}
							<div class="input-group">
								{!! Form::text('height', old('height', $data->height), ['class' => 'form-control decimal']) !!}
								<div class="input-group-append"><span class="input-group-text">cm</span></div>
							</div>
							{!! Form::notification('height', $errors) !!}
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-box-example p-2">
							<img src="{!! asset('images/box.jpeg') !!}" alt="" />
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<div class="card-color mt-3 mb-3">
							<div class="card-body">
								<h5 class="card-title">Detalhes</h5>
								<div class="form-row row-color">
									<div class="col-md-2">
										<div class="position-relative form-group col-select">
											{!! Form::label('color[]', 'Cor', ['class' => 'required']) !!}
											{!! Form::select('color[]', $optionscolor, old('color[]'), ['class' => 'form-control selectpicker select-color']) !!}
											{!! Form::notification('color[]', $errors) !!}
										</div>
									</div>
									<div class="col-md-2">
										<div class="position-relative form-group">
											{!! Form::label('amount[]', 'Quantidade', ['class' => 'required']) !!}
											{!! Form::number('amount[]', old('amount[]'), ['class' => 'form-control text']) !!}
											{!! Form::notification('amount[]', $errors) !!}
										</div>
									</div>
									<div class="col-md-2">
										<div class="position-relative form-group">
											{!! Form::label('photo[]', 'Foto desta cor', ['class' => 'required']) !!}
											{!! Form::file('photo[]', ['class' => 'form-control custom-file-input', 'id' => 'photo-file[]']) !!}
											{!! Form::label('photo-file[]', '&nbsp;', ['class' => 'custom-file-label']) !!}
											{!! Form::notification('photo[]', $errors) !!}
										</div>
									</div>
									<div class="col-md-3">
										<div class="position-relative form-group">
											{!! Form::label('theme[]', 'Temas relacionados') !!}
											{!! Form::select('theme[]', $optionstheme, old('theme[]'), ['class' => 'form-control selectpicker select-theme', 'multiple']) !!}
											{!! Form::notification('theme[]', $errors) !!}
										</div>
									</div>
									<div class="col-md-2">
										<div class="position-relative form-group launch">
											<ul class="button-checkbox">
												<li>
													{!! Form::checkbox('launch[]', 1, (old('launch[]') ? true : false), ['id' => 'checkbox-launch-0', 'class' => 'hide checks']) !!}
													{!! Form::label('checkbox-launch-0', 'Lançamento') !!}
												</li>
											</ul>
										</div>
									</div>
									<div class="col-md-1">
										<div class="btn-action">
											<a href="#" class="mb-2 btn-transition btn btn-outline-alternate btn-block add-color">
												<span class="btn-icon-wrapper opacity-9 mr-1"><i class="fas fa-plus-circle"></i></span> Cores
											</a>
											<a href="#" class="mb-2 btn-transition btn btn-outline-danger btn-block remove-color pr-3 hide">
												<span class="btn-icon-wrapper opacity-9 mr-1"><i class="fas fa-trash-alt"></i></span> Cor
											</a>
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
</div>

<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-button">
				{!! Form::hidden('item_id', $item['id']) !!}
				{!! Form::hidden('count-color', '0', ['id' => 'count-color']) !!}
				{!! Form::buttons('product.list', $data->id) !!}
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@endsection