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
					<i class="fas fa-tags icon-gradient bg-plum-plate"></i>
				</div>
				<div>
					Item do Produto
					<div class="page-title-subheading">Formulário para cadastrar as informações referentes ao item do produto.</div>
				</div>
			</div>
			<div class="page-title-actions">
				<div class="d-inline-block dropdown">
					<a href="{!! route('product-size.edit', $product_size_id) !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
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
			{!! Form::open(['id' => 'form-' . $page, 'route' => $page . '.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Especificação do Produto</h5>
						<div class="form-row">
							<div class="col-md-4">
								<div class="position-relative form-group">
									{!! Form::label('colors', 'Cor', ['class' => 'required']) !!}
									{!! Form::select('colors[]', $optionscolor, old('colors'), ['class' => 'form-control selectpicker multiselect', 'id' => 'colors', 'multiple', 'data-max-options' => '3', 'title' => 'Selecione a cor do Item']) !!}
									{!! Form::notification('colors', $errors) !!}
								</div>
							</div>
							<div class="col-md-2">
								<div class="position-relative form-group">
									{!! Form::label('s_price', 'Preço no Site', ['class' => 'required']) !!}
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
										{!! Form::text('s_price', old('s_price'), ['class' => 'form-control decimal', 'id' => 's_price']) !!}
									</div>
									{!! Form::notification('s_price', $errors) !!}
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-4">
								<div class="position-relative form-group">
									{!! Form::label('supplier_id', 'Fornecedor', ['class' => 'required']) !!}
									{!! Form::select('supplier_id', $optionssupplier, old('supplier_id'), ['class' => 'form-control selectpicker', 'id' => 'supplier_id', 'title' => 'Selecione']) !!}
									{!! Form::notification('supplier_id', $errors) !!}
								</div>
							</div>
							<div class="col-md-2">
								<div class="position-relative form-group">
									{!! Form::label('p_price', 'Preço no Fornecedor', ['class' => 'required']) !!}
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
										{!! Form::text('p_price', old('p_price'), ['class' => 'form-control decimal']) !!}
									</div>
									{!! Form::notification('p_price', $errors) !!}
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-4">
								<div class="position-relative form-group">
									{!! Form::label('theme', 'Temas relacionados') !!}
									{!! Form::select('themes[]', $optionstheme, old('themes'), ['class' => 'form-control selectpicker multiselect', 'id' => 'themes', 'multiple', ' data-selected-text-format' => 'count > 3', 'title' => 'Selecione']) !!}
									{!! Form::notification('themes', $errors) !!}
								</div>
							</div>
							<div class="col-md-3">
								<div class="position-relative form-group">
									<ul class="button-checkbox">
										<li>
											{!! Form::checkbox('launch', 1, (old('launch') ? true : false), ['id' => 'launch', 'class' => 'hide checks']) !!}
											{!! Form::label('launch', 'Este item é um lançamento') !!}
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Foto do Produto</h5>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('new_picture', 'Escolher uma nova foto do Produto - (810px X 900px)') !!}
									{!! Form::file('new_picture', ['class' => 'form-control custom-file-input', 'id' => 'picture[file]']) !!}
									{!! Form::label('picture[file]', '&nbsp;', ['class' => 'custom-file-label']) !!}
									{!! Form::notification('new_picture', $errors) !!}
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="main-card mb-3 card">
					<div class="card-button">
						{!! Form::hidden('product_id', $product_id, ['id' => 'product_id']) !!}
						{!! Form::hidden('product_size_id', $product_size_id, ['id' => 'product_size_id']) !!}
						<a href="{!! route('product-size.edit', $product_size_id) !!}" class="btn-transition btn btn-outline-focus btn-cancel mr-4 pr-3 pl-3"><i class="fas fa-times-circle fa-w-10 pr-2"></i> Voltar</a>
						<button type="submit" class="btn-hover-shine btn btn-shadow btn-success btn-save mr-4 pr-4 pl-4"><i class="fas fa-cloud-upload-alt fa-w-10 pr-2"></i> Salvar</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection
