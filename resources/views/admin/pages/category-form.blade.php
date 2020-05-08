@extends('admin.layouts.main')

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
				<i class="fas fa-store icon-gradient bg-plum-plate"></i>
			</div>
			<div>
				Categorias
				<div class="page-title-subheading">Formulário para cadastrar as categorias de produtos.</div>
			</div>
		</div>
		<div class="page-title-actions">
			<div class="d-inline-block dropdown">
				<a href="{!! route('category.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
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
		<div class="main-card mb-3 card">
			<div class="card-body"><h5 class="card-title">Preencha o formulário</h5>
				<div class="row">
					<div class="col-md-6">
						{!! Form::open(['id' => 'form-category', 'route' => 'category.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
							<div class="position-relative form-group">
								{!! Form::label('material_id', 'Material*') !!}
								{!! Form::select('material_id', $optionsmaterial, old('material_id', $data->material_id), ['class' => 'form-control selectpicker']) !!}
								{!! Form::notification('material_id', $errors) !!}
							</div>
							<div class="position-relative form-group">
								{!! Form::label('name', 'Nome da Categoria*') !!}
								{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
								{!! Form::notification('name', $errors) !!}
							</div>

							<div class="divider"></div>
							@if (isset($data->id))
								{!! Form::hidden('id', $data->id, ['id' => 'id']) !!}
							@endif
							{!! Form::button('<i class="fas fa-cloud-upload-alt fa-w-10"></i> &nbsp; Salvar &nbsp; &nbsp;', ['type' => 'submit', 'class' => 'btn btn-success mb-2 mr-2']) !!}
							<a href="{!! route('category.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
								<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-times-circle fa-w-10"></i></span> Cancelar
							</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
