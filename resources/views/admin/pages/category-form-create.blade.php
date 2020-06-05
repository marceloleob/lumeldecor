@extends('admin.layouts.forms')

@section('heading')
	<div class="page-title-icon">
		<i class="fas fa-store icon-gradient bg-plum-plate"></i>
	</div>
	<div>
		Categorias
		<div class="page-title-subheading">Formulário para cadastrar a categoria dos produtos.</div>
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
									{!! Form::label('material_id', 'Material', ['class' => 'required']) !!}
									{!! Form::select('material_id', $optionsmaterial, old('material_id'), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
									{!! Form::notification('material_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('name', 'Nome da Categoria', ['class' => 'required']) !!}
									{!! Form::text('name', old('name'), ['class' => 'form-control text']) !!}
									{!! Form::notification('name', $errors) !!}
								</div>
							</div>
						</div>
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
