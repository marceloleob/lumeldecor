@extends('admin.layouts.forms')

@section('heading')
	<div class="page-title-icon">
		<i class="fas fa-cubes icon-gradient bg-plum-plate"></i>
	</div>
	<div>
		Produtos
		<div class="page-title-subheading">Formulário para cadastrar os produtos do site.</div>
	</div>
@stop

@section('form')
	{!! Form::open(['id' => 'form-' . $page, 'route' => $page . '.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form', 'files' => true]) !!}
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card card-basic-info">
					<div class="row">
						<div class="col-md-6">
							<div class="card-body">
								<h5 class="card-title">Informações Básicas</h5>
								<div class="row">
									<div class="col-md-12">
										<div class="position-relative form-group">
											{!! Form::label('material_id', 'Material', ['class' => 'required']) !!}
											{!! Form::select('material_id', $optionsmaterial, old('material_id'), ['class' => 'form-control selectpicker']) !!}
											{!! Form::notification('material_id', $errors) !!}
										</div>
										<div class="position-relative form-group">
											{!! Form::label('category_id', 'Categoria', ['class' => 'required']) !!}
											{!! Form::select('category_id', $optionscategory, old('category_id'), ['class' => 'form-control selectpicker']) !!}
											{!! Form::notification('category_id', $errors) !!}
										</div>
										<div class="position-relative form-group">
											{!! Form::label('name', 'Nome do Produto', ['class' => 'required']) !!}
											{!! Form::text('name', old('name'), ['class' => 'form-control text']) !!}
											{!! Form::notification('name', $errors) !!}
										</div>
										<div class="position-relative form-group featured">
											<ul class="button-checkbox">
												<li>
													{!! Form::checkbox('featured', '1', (old('featured') ? true : false), ['id' => 'featured', 'class' => 'hide']) !!}
													{!! Form::label('featured', 'Destacar este produto no Site.') !!}
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card-body">
								<h5 class="card-title">Detalhes</h5>
								<div class="row">
									<div class="col-md-12">
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
					</div>
				</div>
			</div>
		</div>

		<div class="row row-piece">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-body card-piece">
						<h5 class="card-title">Dimensões / Preço</h5>
						<div class="form-row">
							<div class="col-md-5">
								<div class="form-row">
									<div class="col-md-7">
										<div class="position-relative form-group">
											{!! Form::label('size', 'Tamanho', ['class' => 'required']) !!}
											{!! Form::selectSize('size', old('size'), ['class' => 'form-control selectpicker']) !!}
											{!! Form::notification('size', $errors) !!}
										</div>
									</div>
									<div class="col-md-5">
										<div class="position-relative form-group">
											{!! Form::label('weight', 'Peso', ['class' => 'required']) !!}
											<div class="input-group">
												{!! Form::text('weight', old('weight'), ['class' => 'form-control weight']) !!}
												<div class="input-group-append"><span class="input-group-text">kg</span></div>
											</div>
											{!! Form::notification('weight', $errors) !!}
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-12">
										<div class="position-relative form-group">
											{!! Form::label('supplier_id', 'Fornecedor', ['class' => 'required']) !!}
											{!! Form::select('supplier_id', $optionssupplier, old('supplier_id'), ['class' => 'form-control selectpicker']) !!}
											{!! Form::notification('supplier_id', $errors) !!}
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="position-relative form-group">
									{!! Form::label('s_price', 'Preço no Site', ['class' => 'required']) !!}
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
										{!! Form::text('s_price', old('s_price'), ['class' => 'form-control decimal']) !!}
									</div>
									{!! Form::notification('price', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('p_price', 'Preço no Fornecedor', ['class' => 'required']) !!}
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
										{!! Form::text('p_price', old('p_price'), ['class' => 'form-control decimal']) !!}
									</div>
									{!! Form::notification('price', $errors) !!}
								</div>
							</div>
							<div class="col-md-2">
								<div class="position-relative form-group">
									{!! Form::label('lenght', 'Comprimento', ['class' => 'required']) !!}
									<div class="input-group">
										{!! Form::text('length', old('length'), ['class' => 'form-control decimal']) !!}
										<div class="input-group-append"><span class="input-group-text">cm</span></div>
									</div>
									{!! Form::notification('length', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('width', 'Largura', ['class' => 'required']) !!}
									<div class="input-group">
										{!! Form::text('width', old('width'), ['class' => 'form-control decimal']) !!}
										<div class="input-group-append"><span class="input-group-text">cm</span></div>
									</div>
									{!! Form::notification('width', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('height', 'Altura', ['class' => 'required']) !!}
									<div class="input-group">
										{!! Form::text('height', old('height'), ['class' => 'form-control decimal']) !!}
										<div class="input-group-append"><span class="input-group-text">cm</span></div>
									</div>
									{!! Form::notification('height', $errors) !!}
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-box-example p-2">
									<img src="{!! asset('images/box.jpeg') !!}" alt="" />
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-12">
								<div class="card-color mt-3 mb-3">
									<div class="card-body">
										<h5 class="card-title">Detalhes</h5>
										<div class="form-row row-color">
											<div class="col-md-2">
												<div class="position-relative form-group div-color">
													{!! Form::label('item[0][color]', 'Cor', ['class' => 'required']) !!}
													{!! Form::select('item[0][color]', $optionscolor, old('item[0][color]'), ['class' => 'form-control selectpicker select-color', 'data-name' => 'color']) !!}
													{!! Form::notification('item[0][color]', $errors) !!}
												</div>
											</div>
											<div class="col-md-2">
												<div class="position-relative form-group div-amount">
													{!! Form::label('item[0][amount]', 'Quantidade', ['class' => 'required']) !!}
													{!! Form::number('item[0][amount]', old('item[0][amount]'), ['class' => 'form-control input-amount', 'id' => 'item[0][amount]', 'data-name' => 'amount']) !!}
													{!! Form::notification('item[0][amount]', $errors) !!}
												</div>
											</div>
											<div class="col-md-2">
												<div class="position-relative form-group div-photo">
													{!! Form::label('item[0][photo]', 'Foto desta cor', ['class' => 'required']) !!}
													{!! Form::file('item[0][photo]', ['class' => 'form-control custom-file-input', 'id' => 'photo-file[]', 'data-name' => 'photo']) !!}
													{!! Form::label('photo-file[]', '&nbsp;', ['class' => 'custom-file-label']) !!}
													{!! Form::notification('item[0][photo]', $errors) !!}
												</div>
											</div>
											<div class="col-md-3">
												<div class="position-relative form-group div-theme">
													{!! Form::label('item[0][theme]', 'Temas relacionados') !!}
													{!! Form::select('item[0][theme]', $optionstheme, old('item[0][theme]'), ['class' => 'form-control selectpicker select-theme', 'multiple', 'data-name' => 'theme']) !!}
													{!! Form::notification('item[0][theme]', $errors) !!}
												</div>
											</div>
											<div class="col-md-2">
												<div class="position-relative form-group div-launch">
													<ul class="button-checkbox">
														<li>
															{!! Form::checkbox('item[0][launch]', 1, (old('item[0][launch]') ? true : false), ['id' => 'label[0][launch]', 'class' => 'hide checks', 'data-name' => 'launch']) !!}
															{!! Form::label('label[0][launch]', 'Lançamento') !!}
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-1">
												<div class="btn-action">
													<a href="#" class="mb-2 btn-transition btn btn-outline-alternate btn-block add-color">
														<span class="btn-icon-wrapper opacity-9 mr-1"><i class="fas fa-plus-circle"></i></span> Cores
													</a>
													<a href="#" class="mb-2 btn-transition btn btn-outline-danger btn-block remove-color pr-3 hide">
														<span class="btn-icon-wrapper opacity-9 mr-1"><i class="fas fa-trash-alt"></i></span> Cor
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-button">
						{!! Form::hidden('count-color', '0', ['id' => 'count-color']) !!}
						{!! Form::buttons('product.list') !!}
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}

@endsection
