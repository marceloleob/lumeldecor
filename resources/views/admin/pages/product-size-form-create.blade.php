@extends('admin.layouts.app')

@section('js-custom')
{!! Html::script('js/forms/jquery.validate.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.masks.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/admin/pages.js', ['defer' => 'defer']) !!}
@stop

@section('content')

	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="fas fa-ruler-combined icon-gradient bg-plum-plate"></i>
				</div>
				<div>
					Tamanho do Produto
					<div class="page-title-subheading">Formulário para cadastras as informações referentes ao tamanho do produto.</div>
				</div>
			</div>
			<div class="page-title-actions">
				<div class="d-inline-block dropdown">
					<a href="{!! route('product.edit', $product_id) !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
						<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-arrow-circle-left fa-w-20"></i></span>
						Voltar
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			{!! Form::boxNotification($errors) !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => $page . '.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="row">
					<div class="col-md-12">
						<div class="main-card mb-3 card">
							<div class="card-body">
								<h5 class="card-title">Informações dos Tamanhos (P, M, G, Único)</h5>
								<div class="form-row row-dimension">
									<div class="col-md-7">
										<div class="form-row">
											<div class="col-md-4">
												<div class="position-relative form-group">
													{!! Form::label('size', 'Tamanho', ['class' => 'required']) !!}
													{!! Form::selectSize('size', old('size'), ['class' => 'form-control selectpicker', 'id' => 'size', 'title' => 'Selecione']) !!}
													{!! Form::notification('size', $errors) !!}
												</div>
											</div>
											<div class="col-md-4">
												<div class="position-relative form-group">
													{!! Form::label('weight', 'Peso', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('weight', old('weight'), ['class' => 'form-control weight', 'id' => 'weight']) !!}
														<div class="input-group-append"><span class="input-group-text">kg</span></div>
													</div>
													{!! Form::notification('weight', $errors) !!}
												</div>
											</div>
											<div class="col-md-4">
												<div class="position-relative form-group">
													{!! Form::label('shape', 'Formato do Produto', ['class' => 'required']) !!}
													<div class="radio-options">
														<div class="custom-radio custom-control custom-control-inline">
															{!! Form::radio('shape', 'Q', (empty(old('shape')) || old('shape') === 'Q') ? true : false, ['id' => 'shape-Q', 'class' => 'custom-control-input shape']) !!}
															{!! Form::label('shape-Q', 'Quadrado', ['class' => 'custom-control-label']) !!}
														</div>
														<div class="custom-radio custom-control custom-control-inline">
															{!! Form::radio('shape', 'R', (old('shape') === 'R') ? true : false, ['id' => 'shape-R', 'class' => 'custom-control-input shape']) !!}
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
														{!! Form::text('pro_length', old('pro_length'), ['class' => 'form-control decimal']) !!}
														<div class="input-group-append"><span class="input-group-text">cm</span></div>
													</div>
													{!! Form::notification('pro_length', $errors) !!}
												</div>
											</div>
											<div class="col-md-3 div-width {!! (old('shape') === 'R') ? 'hide' : '' !!}">
												<div class="position-relative form-group">
													{!! Form::label('pro_width', 'Largura', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('pro_width', old('pro_width'), ['class' => 'form-control decimal']) !!}
														<div class="input-group-append"><span class="input-group-text">cm</span></div>
													</div>
													{!! Form::notification('pro_width', $errors) !!}
												</div>
											</div>
											<div class="col-md-3">
												<div class="position-relative form-group">
													{!! Form::label('pro_height', 'Altura', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('pro_height', old('pro_height'), ['class' => 'form-control decimal']) !!}
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
														{!! Form::text('shi_length', old('shi_length'), ['class' => 'form-control decimal']) !!}
														<div class="input-group-append"><span class="input-group-text">cm</span></div>
													</div>
													{!! Form::notification('shi_length', $errors) !!}
												</div>
											</div>
											<div class="col-md-3 div-width {!! (old('shape') === 'R') ? 'hide' : '' !!}">
												<div class="position-relative form-group">
													{!! Form::label('shi_width', 'Largura', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('shi_width', old('shi_width'), ['class' => 'form-control decimal']) !!}
														<div class="input-group-append"><span class="input-group-text">cm</span></div>
													</div>
													{!! Form::notification('shi_width', $errors) !!}
												</div>
											</div>
											<div class="col-md-3">
												<div class="position-relative form-group">
													{!! Form::label('shi_height', 'Altura', ['class' => 'required']) !!}
													<div class="input-group">
														{!! Form::text('shi_height', old('shi_height'), ['class' => 'form-control decimal']) !!}
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
								{!! Form::hidden('product_id', $product_id, ['id' => 'product_id']) !!}
								<a href="{!! route('product.edit', $product_id) !!}" class="btn-transition btn btn-outline-focus btn-cancel mr-4 pr-3 pl-3"><i class="fas fa-times-circle fa-w-10 pr-2"></i> Voltar</a>
								<button type="submit" class="btn-hover-shine btn btn-shadow btn-success btn-save mr-4 pr-4 pl-4"><i class="fas fa-cloud-upload-alt fa-w-10 pr-2"></i> Salvar</button>
							</div>
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection
