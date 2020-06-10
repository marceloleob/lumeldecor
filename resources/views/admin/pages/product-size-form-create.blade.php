@extends('admin.layouts.forms')

@section('icon', 'fas fa-ruler-combined')
@section('title', 'Tamanhos do Produto')
@section('subheading', 'Formulário para cadastrar as informações referentes ao tamanho do produto.')
@section('btn-back', route('product.edit', $infos['id']))

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => $page . '.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<ul class="forms-wizard mb-3">
							<li class="nav-item nav-product">
								<a href="{!! route('product.edit', $infos['id']) !!}" class="nav-link"><em><i class="fas fa-cubes"></i></em><span>Informações do Produto</span></a>
							</li>
							<li class="nav-item nav-product active">
								<span class="nav-link"><em><i class="fas fa-ruler-combined"></i></em><span>Tamanho(s) do Produto</span></span>
							</li>
							<li class="nav-item nav-product">
								<span class="nav-link"><em><i class="fas fa-tags"></i></em><span>Cor(es) do Produto</span></span>
							</li>
						</ul>

						<div class="row mb-4">
							<div class="col-md-12 d-flex px-3 py-2 my-2">
								<div class="product-title">{!! $infos['name'] !!}</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="position-relative form-group div-shape">
									<div class="radio-options">
										{{-- {!! Form::label('shape', 'Formato do Produto', ['class' => 'required']) !!} --}}
										<div class="custom-radio custom-control custom-control-inline">
											{!! Form::radio('shape', 'Q', true, ['id' => 'shape-Q', 'class' => 'custom-control-input shape']) !!}
											{!! Form::label('shape-Q', 'Quadrado', ['class' => 'custom-control-label label-shape-Q']) !!}
										</div>
										<div class="custom-radio custom-control custom-control-inline">
											{!! Form::radio('shape', 'R', false, ['id' => 'shape-R', 'class' => 'custom-control-input shape']) !!}
											{!! Form::label('shape-R', 'Redondo', ['class' => 'custom-control-label label-shape-R']) !!}
										</div>
									</div>
									{!! Form::notification('shape', $errors) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="position-relative form-group">
									{!! Form::label('size', 'Tamanho', ['class' => 'required']) !!}
									{!! Form::selectSize('size', old('size'), ['class' => 'form-control selectpicker', 'id' => 'size', 'title' => 'Selecione']) !!}
									{!! Form::notification('size', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('weight', 'Peso', ['class' => 'required']) !!}
									<div class="input-group">
										{!! Form::text('weight', old('weight'), ['class' => 'form-control weight']) !!}
										<div class="input-group-append"><span class="input-group-text">kg</span></div>
									</div>
									{!! Form::notification('weight', $errors) !!}
								</div>
							</div>
							<div class="col-md-2">
								<div class="div-length">
									<div class="position-relative form-group">
										{!! Form::label('pro_length', 'Comprimento', ['class' => 'required']) !!}
										<div class="input-group">
											{!! Form::text('pro_length', old('pro_length'), ['class' => 'form-control decimal', 'placeholder' => 'Produto']) !!}
											<div class="input-group-append"><span class="input-group-text">cm</span></div>
										</div>
										{!! Form::notification('pro_length', $errors) !!}
									</div>
									<div class="position-relative form-group">
										{!! Form::label('shi_length', 'Comprimento', ['class' => 'required']) !!}
										<div class="input-group">
											{!! Form::text('shi_length', old('shi_length'), ['class' => 'form-control decimal', 'placeholder' => 'Embalagem']) !!}
											<div class="input-group-append"><span class="input-group-text">cm</span></div>
										</div>
										{!! Form::notification('shi_length', $errors) !!}
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="div-width {!! (old('shape') === 'R') ? 'hide' : '' !!}">
									<div class="position-relative form-group">
										{!! Form::label('pro_width', 'Largura', ['class' => 'required']) !!}
										<div class="input-group">
											{!! Form::text('pro_width', old('pro_width'), ['class' => 'form-control decimal', 'placeholder' => 'Produto']) !!}
											<div class="input-group-append"><span class="input-group-text">cm</span></div>
										</div>
										{!! Form::notification('pro_width', $errors) !!}
									</div>
									<div class="position-relative form-group">
										{!! Form::label('shi_width', 'Largura', ['class' => 'required']) !!}
										<div class="input-group">
											{!! Form::text('shi_width', old('shi_width'), ['class' => 'form-control decimal', 'placeholder' => 'Embalagem']) !!}
											<div class="input-group-append"><span class="input-group-text">cm</span></div>
										</div>
										{!! Form::notification('shi_width', $errors) !!}
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="position-relative form-group">
									{!! Form::label('pro_height', 'Altura', ['class' => 'required']) !!}
									<div class="input-group">
										{!! Form::text('pro_height', old('pro_height'), ['class' => 'form-control decimal', 'placeholder' => 'Produto']) !!}
										<div class="input-group-append"><span class="input-group-text">cm</span></div>
									</div>
									{!! Form::notification('pro_height', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('shi_height', 'Altura', ['class' => 'required']) !!}
									<div class="input-group">
										{!! Form::text('shi_height', old('shi_height'), ['class' => 'form-control decimal', 'placeholder' => 'Embalagem']) !!}
										<div class="input-group-append"><span class="input-group-text">cm</span></div>
									</div>
									{!! Form::notification('shi_height', $errors) !!}
								</div>
							</div>
							<div class="col-md-4">
								<div class="card-box-example p-4">
									<img src="{!! asset('images/box.jpeg') !!}" alt="" />
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="main-card mb-3 card">
					<div class="card-button">
						{!! Form::hidden('product_id', $infos['id'], ['id' => 'product_id']) !!}
						{!! Form::buttons('product.edit', null, ['back-show' => true, 'cancel-link-params' => $infos['id']]) !!}
						<a href="{!! route('product-size.create', $infos['id']) !!}" class="btn-hover-shine btn btn-shadow btn-primary pr-4 pl-4 float-right"><i class="fas fa-plus-circle fa-w-10 pr-2"></i> Cadastrar um Tamanho novo</a>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	@include('admin.pages.product-size-list')

@endsection
