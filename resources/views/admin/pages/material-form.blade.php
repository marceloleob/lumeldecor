@extends('admin.layouts.forms')

@section('pageback', route('material.list'))

@section('heading')
	<div class="page-title-icon">
		<i class="fas fa-dolly-flatbed icon-gradient bg-plum-plate"></i>
	</div>
	<div>
		Materiais
		<div class="page-title-subheading">Formulário para cadastrar os materiais.</div>
	</div>
@stop

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-material', 'route' => 'material.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Preencha o formulário</h5>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('name', 'Nome do Material', ['class' => 'required']) !!}
									{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
									{!! Form::notification('name', $errors) !!}
								</div>
								{{-- <div class="position-relative form-group">
									{!! Form::label('status', 'Status', ['class' => 'required']) !!}
									{!! Form::text('status', old('status', $data->status), ['class' => 'form-control text']) !!}
									{!! Form::notification('status', $errors) !!}
								</div> --}}
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
