@extends('admin.layouts.forms')

@section('heading')
	<div class="page-title-icon">
		<i class="fas fa-comments-dollar icon-gradient bg-plum-plate"></i>
	</div>
	<div>
		Promoções
		<div class="page-title-subheading">Formulário para editar a promoção do site.</div>
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
									{!! Form::label('name', 'Nome para identificar a Promoção', ['class' => 'required']) !!}
									{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
									{!! Form::notification('name', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('material_id', 'Material') !!}
									{!! Form::select('material_id', $optionsmaterial, old('material_id', $data->material_id), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('material_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('category_id', 'Categoria') !!}
									{!! Form::select('category_id', $optionscategory, old('category_id', $data->category_id), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('category_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('theme_id', 'Tema') !!}
									{!! Form::select('theme_id', $optionstheme, old('theme_id', $data->theme_id), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('theme_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('product_id', 'Produto') !!}
									{!! Form::select('product_id', $optionsproduct, old('product_id', $data->product_id), ['class' => 'form-control selectpicker']) !!}
									{!! Form::notification('product_id', $errors) !!}
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('kind', 'Tipo do desconto', ['class' => 'required']) !!}
											{!! Form::selectKind('kind', old('kind', $data->kind), ['class' => 'form-control kind selectpicker']) !!}
											{!! Form::notification('kind', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('amount', 'Valor do Cupom', ['class' => 'required']) !!}
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text prepend-kind"></span></div>
												{!! Form::text('amount', old('amount', $data->amount), ['class' => 'form-control decimal']) !!}
												<div class="input-group-append"><span class="input-group-text append-kind"></span></div>
											</div>
											{!! Form::notification('amount', $errors) !!}
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('start_date', 'Data de Início', ['class' => 'required']) !!}
											<div class="input-group">
												{!! Form::text('start_date', old('start_date', $data->start_date), ['class' => 'form-control datepicker']) !!}
												<div class="input-group-append"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></div>
											</div>
											{!! Form::notification('start_date', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('finish_date', 'Data do Término', ['class' => 'required']) !!}
											<div class="input-group">
												{!! Form::text('finish_date', old('finish_date', $data->finish_date), ['class' => 'form-control datepicker']) !!}
												<div class="input-group-append"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></div>
											</div>
											{!! Form::notification('finish_date', $errors) !!}
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
					<div class="card-button">
						{!! Form::buttons($page . '.list', $data->id) !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
