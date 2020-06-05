@extends('admin.layouts.forms')

@section('icon', 'far fa-calendar-alt')
@section('title', 'Campanhas')
@section('subheading', 'Formulário para editar uma campanha no site.')
@section('btn-back', route($page . '.list'))

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => [$page . '.update', $data->id], 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Preencha o formulário</h5>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('name', 'Nome do Campanha', ['class' => 'required']) !!}
									{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
									{!! Form::notification('name', $errors) !!}
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('start_day', 'Dia inicial', ['class' => 'required']) !!}
											{!! Form::selectDay('start_day', old('start_day', $data->start_day), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
											{!! Form::notification('start_day', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('start_month', 'Mês inicial', ['class' => 'required']) !!}
											{!! Form::selectMonth('start_month', old('start_month', $data->start_month), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
											{!! Form::notification('start_month', $errors) !!}
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('finish_day', 'Dia final', ['class' => 'required']) !!}
											{!! Form::selectDay('finish_day', old('finish_day', $data->finish_day), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
											{!! Form::notification('finish_day', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('finish_month', 'Mês final', ['class' => 'required']) !!}
											{!! Form::selectMonth('finish_month', old('finish_month', $data->finish_month), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
											{!! Form::notification('finish_month', $errors) !!}
										</div>
									</div>
								</div>
								<div class="position-relative form-group">
									{!! Form::switch('status', $data->status) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Selecione os produtos desta campanha</h5>
						<div class="form-row">
							<div class="col-md-5">
								<div class="position-relative form-group">
									{!! Form::label('material_id', 'Material', ['class' => 'required']) !!}
									{!! Form::select('material_id', $optionsmaterial, old('material_id', $data->material_id), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
									{!! Form::notification('material_id', $errors) !!}
								</div>
							</div>
							<div class="col-md-5">
								<div class="position-relative form-group">
									{!! Form::label('category_id', 'Categoria') !!}
									{!! Form::select('category_id', $optionscategory, old('category_id', $data->category_id), ['class' => 'form-control selectpicker', 'title' => 'Selecione o Material']) !!}
									{!! Form::hidden('category_id_hide', old('category_id', $data->category_id)) !!}
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
