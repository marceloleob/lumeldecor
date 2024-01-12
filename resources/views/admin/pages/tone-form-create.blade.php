@extends('admin.layouts.forms')

@section('icon', 'fas fa-swatchbook')
@section('title', 'Tonalidades')
@section('subheading', 'Formulário para cadastrar as tonalidades dos produtos.')
@section('btn-back', route($page . '.list'))

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => $page . '.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Preencha o formulário</h5>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('color_id', 'Selecione o gupo de cor desta tonalidade', ['class' => 'required']) !!}
									{!! Form::select('color_id', $optionscolor, old('color_id'), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
									{!! Form::notification('color_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('name', 'Nome da Tonalidade', ['class' => 'required']) !!}
									{!! Form::text('name', old('name'), ['class' => 'form-control text']) !!}
									{!! Form::notification('name', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('hexa', 'Tonalidade', ['class' => 'required']) !!}
									{!! Form::color('hexa', old('hexa'), ['data-options' => 'pencil', 'class' => 'form-control color']) !!}
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
