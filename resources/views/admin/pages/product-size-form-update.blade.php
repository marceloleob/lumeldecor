@extends('admin.layouts.forms')

@section('icon', 'fas fa-ruler-combined')
@section('title', 'Tamanho do Produto')
@section('subheading', 'Formulário para editar as informação referente ao tamanho do produto.')
@section('btn-back', route('product.edit', $data->product_id))

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => [$page . '.update', $data->id], 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="row">
					<div class="col-md-12">
						<div class="main-card mb-3 card">
							<div class="card-body">
								<h5 class="card-title">Informações dos Tamanhos (P, M, G, Único)</h5>
								<div class="form-row row-dimension">
									<div class="col-md-7">
										<div class="form-row">
											<div class="col-md-3">
												<h5 class="card-title card-dimension"><i class="fas fa-weight"></i> &nbsp; {!! $data->size !!}</h5>
											</div>
											<div class="col-md-3">
												<div class="position-relative form-group">
													{!! Form::label('weight', 'Peso', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('weight', old('weight', $data->weight), ['class' => 'form-control weight', 'id' => 'weight']) !!}
														<div class="input-group-append"><span class="input-group-text">kg</span></div>
													</div>
													{!! Form::notification('weight', $errors) !!}
												</div>
											</div>
											<div class="col-md-6">
												<div class="position-relative form-group">
													{!! Form::label('shape', 'Formato do Produto', ['class' => 'required']) !!}
													<div class="radio-options">
														<div class="custom-radio custom-control custom-control-inline">
															{!! Form::radio('shape', 'Q', ($data->shape === 'Q') ? true : false, ['id' => 'shape-Q', 'class' => 'custom-control-input shape']) !!}
															{!! Form::label('shape-Q', 'Quadrado', ['class' => 'custom-control-label']) !!}
														</div>
														<div class="custom-radio custom-control custom-control-inline">
															{!! Form::radio('shape', 'R', ($data->shape === 'R') ? true : false, ['id' => 'shape-R', 'class' => 'custom-control-input shape']) !!}
															{!! Form::label('shape-R', 'Redondo', ['class' => 'custom-control-label']) !!}
														</div>
													</div>
													{!! Form::notification('shape', $errors) !!}
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-3">
												<h5 class="card-title card-dimension"><i class="fas fa-shopping-bag"></i> &nbsp; Produto</h5>
											</div>
											<div class="col-md-3 div-length">
												<div class="position-relative form-group">
													{!! Form::label('pro_length', 'Comprimento', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('pro_length', old('pro_length', $data->pro_length), ['class' => 'form-control decimal']) !!}
														<div class="input-group-append"><span class="input-group-text">cm</span></div>
													</div>
													{!! Form::notification('pro_length', $errors) !!}
												</div>
											</div>
											<div class="col-md-3 div-width {!! ($data->shape === 'R') ? 'hide' : '' !!}">
												<div class="position-relative form-group">
													{!! Form::label('pro_width', 'Largura', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('pro_width', old('pro_width', $data->pro_width), ['class' => 'form-control decimal']) !!}
														<div class="input-group-append"><span class="input-group-text">cm</span></div>
													</div>
													{!! Form::notification('pro_width', $errors) !!}
												</div>
											</div>
											<div class="col-md-3">
												<div class="position-relative form-group">
													{!! Form::label('pro_height', 'Altura', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('pro_height', old('pro_height', $data->pro_height), ['class' => 'form-control decimal']) !!}
														<div class="input-group-append"><span class="input-group-text">cm</span></div>
													</div>
													{!! Form::notification('pro_height', $errors) !!}
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-3">
												<h5 class="card-title card-dimension"><i class="fas fa-dolly-flatbed"></i> &nbsp; Embalagem</h5>
											</div>
											<div class="col-md-3 div-length">
												<div class="position-relative form-group">
													{!! Form::label('shi_length', 'Comprimento', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('shi_length', old('shi_length', $data->shi_length), ['class' => 'form-control decimal']) !!}
														<div class="input-group-append"><span class="input-group-text">cm</span></div>
													</div>
													{!! Form::notification('shi_length', $errors) !!}
												</div>
											</div>
											<div class="col-md-3 div-width {!! ($data->shape === 'R') ? 'hide' : '' !!}">
												<div class="position-relative form-group">
													{!! Form::label('shi_width', 'Largura', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('shi_width', old('shi_width', $data->shi_width), ['class' => 'form-control decimal']) !!}
														<div class="input-group-append"><span class="input-group-text">cm</span></div>
													</div>
													{!! Form::notification('shi_width', $errors) !!}
												</div>
											</div>
											<div class="col-md-3">
												<div class="position-relative form-group">
													{!! Form::label('shi_height', 'Altura', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('shi_height', old('shi_height', $data->shi_height), ['class' => 'form-control decimal']) !!}
														<div class="input-group-append"><span class="input-group-text">cm</span></div>
													</div>
													{!! Form::notification('shi_height', $errors) !!}
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="card-box-example p-4">
											<img src="{!! asset('images/box.jpeg') !!}" alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="main-card mb-3 card">
							<div class="card-button">
								{!! Form::hidden('_method', 'PUT') !!}
								{!! Form::hidden('id', $data->id, ['id' => 'id']) !!}
								{!! Form::hidden('size', $data->size, ['id' => 'size']) !!}
								{!! Form::hidden('product_id', $data->product_id, ['id' => 'product_id']) !!}
								<a href="{!! route('product.edit', $data->product_id) !!}" class="btn-transition btn btn-outline-focus btn-cancel mr-4 pr-3 pl-3"><i class="fas fa-times-circle fa-w-10 pr-2"></i> Voltar</a>
								<button type="submit" class="btn-hover-shine btn btn-shadow btn-success btn-save mr-4 pr-4 pl-4"><i class="fas fa-cloud-upload-alt fa-w-10 pr-2"></i> Salvar</button>
							</div>
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<hr />
		</div>
	</div>

	@include('admin.pages.item-list')

@endsection
