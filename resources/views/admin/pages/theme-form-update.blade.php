@extends('admin.layouts.forms')

@section('heading')
	<div class="page-title-icon">
		<i class="far fa-star icon-gradient bg-plum-plate"></i>
	</div>
	<div>
		Temas
		<div class="page-title-subheading">Formulário para editar o tema para os produtos.</div>
	</div>
@stop

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => [$page . '.update', $data->id], 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Preencha o formulário</h5>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('name', 'Nome do Tema', ['class' => 'required']) !!}
									{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
									{!! Form::notification('name', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('show', 'Mostrar no Site?', ['class' => 'required']) !!}
									<div>
										<div class="custom-radio custom-control">
											{!! Form::radio('show', '1', ($data->show === 1) ? true : false, ['class' => 'custom-control-input', 'id' => 'show-active']) !!}
											{!! Form::label('show-active', 'Sim', ['class' => 'custom-control-label']) !!}
										</div>
										<div class="custom-radio custom-control">
											{!! Form::radio('show', '0', ($data->show === 0) ? true : false, ['class' => 'custom-control-input', 'id' => 'show-inactive']) !!}
											{!! Form::label('show-inactive', 'Não', ['class' => 'custom-control-label']) !!}
										</div>
									</div>
									{!! Form::notification('show', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::switch('status', $data->status) !!}
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
									{!! Form::label('material_id', 'Material') !!}
									{!! Form::select('material_id', $optionsmaterial, old('material_id', $data->material_id), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('material_id', $errors) !!}
								</div>
							</div>
							<div class="col-md-5">
								<div class="position-relative form-group">
									{!! Form::label('category_id', 'Categoria') !!}
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
						{{-- <div class="form-row">
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
						</div> --}}
					</div>
				</div>
				<div class="main-card mb-3 card">
					<div class="card-button">
						{!! Form::buttons($page . '.list', $data->id) !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
