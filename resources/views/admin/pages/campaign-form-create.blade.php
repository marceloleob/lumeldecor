@extends('admin.layouts.forms')

@section('heading')
	<div class="page-title-icon">
		<i class="far fa-calendar-alt icon-gradient bg-plum-plate"></i>
	</div>
	<div>
		Campanhas
		<div class="page-title-subheading">Formulário para cadastrar uma nova campanha no site.</div>
	</div>
@stop

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => $page . '.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Preencha o formulário</h5>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('name', 'Nome do Campanha', ['class' => 'required']) !!}
									{!! Form::text('name', old('name'), ['class' => 'form-control text']) !!}
									{!! Form::notification('name', $errors) !!}
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('start_day', 'Dia inicial', ['class' => 'required']) !!}
											{!! Form::selectDay('start_day', old('start_day'), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
											{!! Form::notification('start_day', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('start_month', 'Mês inicial', ['class' => 'required']) !!}
											{!! Form::selectMonth('start_month', old('start_month'), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
											{!! Form::notification('start_month', $errors) !!}
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('finish_day', 'Dia final', ['class' => 'required']) !!}
											{!! Form::selectDay('finish_day', old('finish_day'), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
											{!! Form::notification('finish_day', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('finish_month', 'Mês final', ['class' => 'required']) !!}
											{!! Form::selectMonth('finish_month', old('finish_month'), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
											{!! Form::notification('finish_month', $errors) !!}
										</div>
									</div>
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
									{!! Form::select('material_id', $optionsmaterial, old('material_id'), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
									{!! Form::notification('material_id', $errors) !!}
								</div>
							</div>
							<div class="col-md-5">
								<div class="position-relative form-group">
									{!! Form::label('category_id', 'Categoria') !!}
									{!! Form::select('category_id', $optionscategory, old('category_id'), ['class' => 'form-control selectpicker', 'title' => 'Selecione o Material']) !!}
									{!! Form::hidden('category_id_hide', old('category_id')) !!}
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
						{!! Form::buttons($page . '.list') !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
