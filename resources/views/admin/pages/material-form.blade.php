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
				<i class="fas fa-dolly-flatbed icon-gradient bg-plum-plate"></i>
			</div>
			<div>
				Materiais
				<div class="page-title-subheading">Formulário para cadastrar os materiais.</div>
			</div>
		</div>
		<div class="page-title-actions">
			<div class="d-inline-block dropdown">
				<a href="{!! route('material.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
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
		{!! Form::open(['id' => 'form-material', 'route' => 'material.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
			<div class="main-card mb-3 card">
				<div class="card-body"><h5 class="card-title">Preencha o formulário</h5>
					<div class="form-row">
						<div class="col-md-6">
							<div class="position-relative form-group">
								{!! Form::label('name', 'Nome do Material*') !!}
								{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
								{!! Form::notification('name', $errors) !!}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-card mb-3 card">
				<div class="card-button">
					{!! Form::buttons('material.list', $data->id) !!}
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</div>

@endsection
