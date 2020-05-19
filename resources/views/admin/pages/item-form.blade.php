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
				<div class="page-title-subheading">Primeira parte do formulário para cadastrar os produtos.</div>
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

{!! Form::open(['id' => 'form-item', 'route' => 'item.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
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
									{!! Form::label('material_id', 'Material', ['class' => 'required']) !!}
									{!! Form::select('material_id', $optionsmaterial, old('material_id', $data->material_id), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('material_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('category_id', 'Categoria', ['class' => 'required']) !!}
									{!! Form::select('category_id', $optionscategory, old('category_id', $data->category_id), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('category_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('name', 'Nome do Produto', ['class' => 'required']) !!}
									{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
									{!! Form::notification('name', $errors) !!}
								</div>
								<div class="position-relative form-group featured">
									<ul class="button-checkbox">
										<li>
											{!! Form::checkbox('featured', '1', (old('featured', $data->featured) ? true : false), ['id' => 'featured', 'class' => 'hide']) !!}
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
									{!! Form::textarea('description', old('description', $data->description), ['class' => 'form-control textarea', 'placeholder' => 'Detalhes do produto', 'rows' => '6']) !!}
									{!! Form::notification('description', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('hashtag', 'Hashtags') !!}
									{!! Form::textarea('hashtag', old('hashtag', $data->hashtag), ['class' => 'form-control textarea', 'placeholder' => 'Adicione as hashtags referentes ao produto', 'rows' => '5']) !!}
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

<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-button">
				{!! Form::buttons('product.list', $data->id) !!}
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@endsection