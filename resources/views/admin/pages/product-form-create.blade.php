@extends('admin.layouts.forms')

@section('icon', 'fas fa-cubes')
@section('title', 'Produtos')
@section('subheading', 'Formulário para cadastrar os produtos do site.')
@section('btn-back', route($page . '.list'))

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => $page . '.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form', 'files' => true]) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<ul class="forms-wizard mb-5">
							<li class="nav-item nav-product active">
								<span class="nav-link"><em><i class="fas fa-cubes"></i></em><span>Informações do Produto</span></span>
							</li>
							<li class="nav-item nav-product">
								<span class="nav-link"><em><i class="fas fa-ruler-combined"></i></em><span>Tamanho(s) do Produto</span></span>
							</li>
							<li class="nav-item nav-product">
								<span class="nav-link"><em><i class="fas fa-tags"></i></em><span>Cor(es) do Produto</span></span>
							</li>
						</ul>

						<div class="row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('material_id', 'Material', ['class' => 'required']) !!}
									{!! Form::select('material_id', $optionsmaterial, old('material_id'), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
									{!! Form::notification('material_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('category_id', 'Categoria', ['class' => 'required']) !!}
									{!! Form::select('category_id', $optionscategory, old('category_id'), ['class' => 'form-control selectpicker', 'title' => 'Selecione primeiro um Material']) !!}
									{!! Form::notification('category_id', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('name', 'Nome do Produto', ['class' => 'required']) !!}
									{!! Form::text('name', old('name'), ['class' => 'form-control text']) !!}
									{!! Form::notification('name', $errors) !!}
								</div>
								<div class="position-relative form-group">
									<ul class="button-checkbox">
										<li>
											{!! Form::checkbox('featured', 1, (old('featured') ? true : false), ['id' => 'featured', 'class' => 'hide']) !!}
											{!! Form::label('featured', 'Destacar este produto no site') !!}
										</li>
										<li>
											{!! Form::checkbox('launch', 1, (old('launch') ? true : false), ['id' => 'launch', 'class' => 'hide']) !!}
											{!! Form::label('launch', 'Este produto é um lançamento') !!}
										</li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('description', 'Descrição', ['class' => 'required']) !!}
									{!! Form::textarea('description', old('description'), ['class' => 'form-control textarea', 'placeholder' => 'Detalhes do produto', 'rows' => '6']) !!}
									{!! Form::notification('description', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('hashtag', 'Hashtags') !!}
									{!! Form::textarea('hashtag', old('hashtag'), ['class' => 'form-control textarea', 'placeholder' => 'Adicione as hashtags referentes ao produto', 'rows' => '5']) !!}
									{!! Form::notification('hashtag', $errors) !!}
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
