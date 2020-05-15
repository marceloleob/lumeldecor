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
				<i class="far fa-star icon-gradient bg-plum-plate"></i>
			</div>
			<div>
				Temas
				<div class="page-title-subheading">Formulário para cadastrar um novo tema.</div>
			</div>
		</div>
		<div class="page-title-actions">
			<div class="d-inline-block dropdown">
				<a href="{!! route('theme.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
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
		{!! Form::open(['id' => 'form-theme', 'route' => 'theme.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
			<div class="main-card mb-3 card">
				<div class="card-body"><h5 class="card-title">Preencha o formulário</h5>
					<div class="form-row">
						<div class="col-md-6">
							<div class="position-relative form-group">
								{!! Form::label('name', 'Nome do Tema*') !!}
								{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
								{!! Form::notification('name', $errors) !!}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-card mb-3 card">
				<div class="card-body"><h5 class="card-title">Selecione os produtos deste Tema</h5>
					<div class="form-row">
						<div class="col-md-5">
							<div class="position-relative form-group">
								{!! Form::label('material_id', 'Material*') !!}
								{!! Form::select('material_id', $optionsmaterial, old('material_id', $data->material_id), ['class' => 'form-control selectpicker']) !!}
								{!! Form::notification('material_id', $errors) !!}
							</div>
						</div>
						<div class="col-md-5">
							<div class="position-relative form-group">
								{!! Form::label('category_id', 'Categoria*') !!}
								{!! Form::select('category_id', $optionscategory, old('category_id', $data->category_id), ['class' => 'form-control selectpicker']) !!}
								{!! Form::notification('category_id', $errors) !!}
							</div>
						</div>
						<div class="col-md-2">
							<div class="btn-action">
								{!! Form::button('<i class="fas fa-search pr-2"></i> Buscar', ['type' => 'button', 'class' => 'btn-hover-shine btn btn-shadow btn-focus btn-block']) !!}
							</div>
						</div>
					</div>
					<div class="divider"></div>
					<div class="form-row">
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-shadow-info border mb-3 card card-body border-info">
								<h5 class="card-title">Boleira Cerâmica Lisa</h5>
								<img src="{!! asset('images/products/boleira-ceramica-lisa.jpg') !!}" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-card mb-3 card">
				<div class="card-button">
					{!! Form::buttons('theme.list', $data->id) !!}
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</div>

@endsection
