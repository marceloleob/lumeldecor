@extends('admin.layouts.forms')

@section('icon', 'fas fa-ruler-combined')
@section('title', 'Tamanho do Produto')
@section('subheading', 'Formulário para editar as informação referente ao tamanho do produto.')
@section('btn-back', route('product.edit', $data->product_id))

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => [$page . '.update', $data->id], 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<ul class="forms-wizard mb-5">
							<li class="nav-item">
								<span class="nav-link"><em><i class="fas fa-cubes"></i></em><span>Informações do Produto</span></span>
							</li>
							<li class="nav-item active">
								<span class="nav-link"><em><i class="fas fa-ruler-combined"></i></em><span>Tamanho(s) do Produto</span></span>
							</li>
							<li class="nav-item">
								<span class="nav-link"><em><i class="fas fa-tags"></i></em><span>Core(s) do Produto</span></span>
							</li>
						</ul>

						<div class="row">
							<div class="col-md-12">
								<div class="position-relative form-group div-shape">
									<div class="radio-options">
										{{-- {!! Form::label('shape', 'Formato do Produto', ['class' => 'required']) !!} --}}
										<div class="custom-radio custom-control custom-control-inline">
											{!! Form::radio('shape', 'Q', ($data->shape === 'Q') ? true : false, ['id' => 'shape-Q', 'class' => 'custom-control-input shape']) !!}
											{!! Form::label('shape-Q', 'Quadrado', ['class' => 'custom-control-label label-shape-Q']) !!}
										</div>
										<div class="custom-radio custom-control custom-control-inline">
											{!! Form::radio('shape', 'R', ($data->shape === 'R') ? true : false, ['id' => 'shape-R', 'class' => 'custom-control-input shape']) !!}
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
									{{-- {!! Form::label('size', 'Tamanho', ['class' => 'required']) !!} --}}
									<div class="show-size">{!! $data->size !!}</div>
								</div>
								<div class="position-relative form-group">
									{!! Form::label('weight', 'Peso', ['class' => 'required']) !!}
									<div class="input-group">
										{!! Form::text('weight', old('weight', $data->weight), ['class' => 'form-control weight']) !!}
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
											{!! Form::text('pro_length', old('pro_length', $data->pro_length), ['class' => 'form-control decimal', 'placeholder' => 'Produto']) !!}
											<div class="input-group-append"><span class="input-group-text">cm</span></div>
										</div>
										{!! Form::notification('pro_length', $errors) !!}
									</div>
									<div class="position-relative form-group">
										{!! Form::label('shi_length', 'Comprimento', ['class' => 'required']) !!}
										<div class="input-group">
											{!! Form::text('shi_length', old('shi_length', $data->shi_length), ['class' => 'form-control decimal', 'placeholder' => 'Embalagem']) !!}
											<div class="input-group-append"><span class="input-group-text">cm</span></div>
										</div>
										{!! Form::notification('shi_length', $errors) !!}
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="div-width {!! (old('shape', $data->shape) === 'R') ? 'hide' : '' !!}">
									<div class="position-relative form-group">
										{!! Form::label('pro_width', 'Largura', ['class' => 'required']) !!}
										<div class="input-group">
											{!! Form::text('pro_width', old('pro_width', $data->pro_width), ['class' => 'form-control decimal', 'placeholder' => 'Produto']) !!}
											<div class="input-group-append"><span class="input-group-text">cm</span></div>
										</div>
										{!! Form::notification('pro_width', $errors) !!}
									</div>
									<div class="position-relative form-group">
										{!! Form::label('shi_width', 'Largura', ['class' => 'required']) !!}
										<div class="input-group">
											{!! Form::text('shi_width', old('shi_width', $data->shi_width), ['class' => 'form-control decimal', 'placeholder' => 'Embalagem']) !!}
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
										{!! Form::text('pro_height', old('pro_height', $data->pro_height), ['class' => 'form-control decimal', 'placeholder' => 'Produto']) !!}
										<div class="input-group-append"><span class="input-group-text">cm</span></div>
									</div>
									{!! Form::notification('pro_height', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('shi_height', 'Altura', ['class' => 'required']) !!}
									<div class="input-group">
										{!! Form::text('shi_height', old('shi_height', $data->shi_height), ['class' => 'form-control decimal', 'placeholder' => 'Embalagem']) !!}
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
						{!! Form::hidden('size', $data->size, ['id' => 'size']) !!}
						{!! Form::hidden('product_id', $data->product_id, ['id' => 'product_id']) !!}
						{!! Form::buttons('product.edit', $data->id, ['cancel-link-params' => $data->product_id]) !!}
						<a href="{!! route('product-size.create', $data->product_id) !!}" class="btn-hover-shine btn btn-shadow btn-primary btn-save btn-wide btn-pill pr-4 pl-4 float-right"><i class="fas fa-plus-circle fa-w-10 pr-2"></i> Cadastrar um Tamanho Novo</a>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	@include('admin.pages.product-size-list')

@endsection
