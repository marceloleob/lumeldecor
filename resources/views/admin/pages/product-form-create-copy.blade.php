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
<div class="row">
	<div class="col-md-12">
		{!! Form::open(['id' => 'form-' . $page, 'route' => $page . '.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form', 'files' => true]) !!}
			<div class="row row-product-info">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
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

			{{-- INICIO DO BLOCO "PRODUTO" --}}
			<div class="row row-product">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<h5 class="card-title">Dimensões</h5>
							<div class="form-row">
								<div class="col-md-9">
									<div class="form-row">
										<div class="col-md-8">
											<div class="position-relative form-group div-size">
												{!! Form::label('product[0][size]', 'Tamanho', ['class' => 'required']) !!}
												{!! Form::selectSize('product[0][size]', old('product[0][size]'), ['class' => 'form-control selectpicker select-size', 'data-name' => 'size', 'data-group' => 'product']) !!}
												{!! Form::notification('product[0][size]', $errors) !!}
											</div>
										</div>
										<div class="col-md-4">
											<div class="position-relative form-group div-weight">
												{!! Form::label('product[0][weight]', 'Peso', ['class' => 'required']) !!}
												<div class="input-group">
													{!! Form::text('product[0][weight]', old('product[0][weight]'), ['class' => 'form-control weight input-weight', 'data-name' => 'weight', 'data-group' => 'product']) !!}
													<div class="input-group-append"><span class="input-group-text">kg</span></div>
												</div>
												{!! Form::notification('product[0][weight]', $errors) !!}
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-4">
											<div class="position-relative form-group div-length">
												{!! Form::label('product[0][lenght]', 'Comprimento', ['class' => 'required']) !!}
												<div class="input-group">
													{!! Form::text('product[0][length]', old('product[0][length]'), ['class' => 'form-control decimal input-lenght', 'data-name' => 'length', 'data-group' => 'product']) !!}
													<div class="input-group-append"><span class="input-group-text">cm</span></div>
												</div>
												{!! Form::notification('product[0][length]', $errors) !!}
											</div>
										</div>
										<div class="col-md-4">
											<div class="position-relative form-group div-width">
												{!! Form::label('product[0][width]', 'Largura', ['class' => 'required']) !!}
												<div class="input-group">
													{!! Form::text('product[0][width]', old('product[0][width]'), ['class' => 'form-control decimal input-width', 'data-name' => 'width', 'data-group' => 'product']) !!}
													<div class="input-group-append"><span class="input-group-text">cm</span></div>
												</div>
												{!! Form::notification('product[0][width]', $errors) !!}
											</div>
										</div>
										<div class="col-md-4">
											<div class="position-relative form-group div-height">
												{!! Form::label('product[0][height]', 'Altura', ['class' => 'required']) !!}
												<div class="input-group">
													{!! Form::text('product[0][height]', old('product[0][height]'), ['class' => 'form-control decimal input-height', 'data-name' => 'height', 'data-group' => 'product']) !!}
													<div class="input-group-append"><span class="input-group-text">cm</span></div>
												</div>
												{!! Form::notification('product[0][height]', $errors) !!}
											</div>
										</div>
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
									<div class="card-item mt-3 mb-3">
										<div class="card-body">
											<h5 class="card-title">Especificação do Produto</h5>
											{{-- INICIO DO BLOCO "ITEM" --}}
											<div class="row row-item">
												<div class="col-md-12">
													<div class="form-row line-item">
														<div class="col-md-3">
															<div class="position-relative form-group div-colors">
																{!! Form::label('product[0][item][0][colors]', 'Cor', ['class' => 'required']) !!}
																{!! Form::select('product[0][item][0][colors][]', $optionscolor, old('product[0][item][0][colors]'), ['class' => 'form-control selectpicker select-colors multiselect', 'multiple', 'data-name' => 'colors', 'data-group' => 'item', 'data-max-options' => '3']) !!}
																{!! Form::notification('product[0][item][0][colors]', $errors) !!}
															</div>
														</div>
														<div class="col-md-2">
															<div class="position-relative form-group div-s_price">
																{!! Form::label('product[0][item][0][s_price]', 'Preço no Site', ['class' => 'required']) !!}
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
																	{!! Form::text('product[0][item][0][s_price]', old('product[0][item][0][s_price]'), ['class' => 'form-control decimal input-s_price', 'data-name' => 's_price', 'data-group' => 'item']) !!}
																</div>
																{!! Form::notification('product[0][item][0][s_price]', $errors) !!}
															</div>
														</div>
														<div class="col-md-2">
															<div class="position-relative form-group div-amount">
																{!! Form::label('product[0][item][0][amount]', 'Quantidade', ['class' => 'required']) !!}
																{!! Form::number('product[0][item][0][amount]', old('product[0][item][0][amount]'), ['class' => 'form-control input-amount', 'data-name' => 'amount', 'data-group' => 'item']) !!}
																{!! Form::notification('product[0][item][0][amount]', $errors) !!}
															</div>
														</div>
														<div class="col-md-5">
															<div class="position-relative form-group div-photo">
																{!! Form::label('product[0][item][0][photo]', 'Foto desta cor', ['class' => 'required']) !!}
																{!! Form::file('product[0][item][0][photo]', ['class' => 'form-control custom-file-input', 'id' => 'product[0][item][0][photo][file]', 'data-name' => 'photo', 'data-group' => 'item']) !!}
																{!! Form::label('product[0][item][0][photo][file]', '&nbsp;', ['class' => 'custom-file-label']) !!}
																{!! Form::notification('product[0][item][0][photo]', $errors) !!}
															</div>
														</div>
													</div>
													<div class="form-row line-item">
														<div class="col-md-3">
															<div class="position-relative form-group div-supplier_id">
																{!! Form::label('product[0][item][0][supplier_id]', 'Fornecedor', ['class' => 'required']) !!}
																{!! Form::select('product[0][item][0][supplier_id]', $optionssupplier, old('product[0][item][0][supplier_id]'), ['class' => 'form-control selectpicker select-supplier_id', 'data-name' => 'supplier_id', 'data-group' => 'item']) !!}
																{!! Form::notification('product[0][item][0][supplier_id]', $errors) !!}
															</div>
														</div>
														<div class="col-md-2">
															<div class="position-relative form-group div-p_price">
																{!! Form::label('product[0][item][0][p_price]', 'Preço no Fornecedor', ['class' => 'required']) !!}
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">R$</span></div>
																	{!! Form::text('product[0][item][0][p_price]', old('product[0][item][0][p_price]'), ['class' => 'form-control decimal input-p_price', 'data-name' => 'p_price', 'data-group' => 'item']) !!}
																</div>
																{!! Form::notification('product[0][item][0][p_price]', $errors) !!}
															</div>
														</div>
														<div class="col-md-4">
															<div class="position-relative form-group div-themes">
																{!! Form::label('product[0][item][0][theme]', 'Temas relacionados') !!}
																{!! Form::select('product[0][item][0][themes][]', $optionstheme, old('product[0][item][0][themes]'), ['class' => 'form-control selectpicker select-themes multiselect', 'data-name' => 'themes', 'data-group' => 'item', 'multiple']) !!}
																{!! Form::notification('product[0][item][0][themes]', $errors) !!}
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-row">
																<div class="col-md-5">
																	<div class="position-relative form-group div-launch">
																		<ul class="button-checkbox">
																			<li>
																				{!! Form::checkbox('product[0][item][0][launch]', 1, (old('product[0][item][0][launch]') ? true : false), ['id' => 'product[0][item][0][launch]', 'class' => 'hide checks', 'data-name' => 'launch', 'data-group' => 'item']) !!}
																				{!! Form::label('product[0][item][0][launch]', 'Lançamento') !!}
																			</li>
																		</ul>
																	</div>
																</div>
																<div class="col-md-7">
																	<div class="btn-action">
																		<a href="#" class="mb-2 btn-transition btn btn-outline-alternate btn-block btn-add" data-block="item" data-counter-product="0" data-counter-item="1">
																			<span class="btn-icon-wrapper opacity-9 mr-1"><i class="fas fa-plus-circle"></i></span> Adicionar outra cor
																		</a>
																		<a href="#" class="mb-2 btn-transition btn btn-outline-danger btn-block btn-remove hide" data-block="item">
																			<span class="btn-icon-wrapper opacity-9 mr-1"><i class="fas fa-trash-alt"></i></span> Remover esta cor
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											{{-- FIM DO BLOCO "ITEM" --}}
										</div>
									</div>
								</div>
							</div>
							<div class="form-row row-add-product hide">
								<div class="col-md-12">
									<div class="card-button-add mt-3">
										<a href="#" class="mb-2 mr-2 btn btn-info btn-add" data-block="product" data-counter-product="1" data-counter-item="0">
											<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-plus-circle fa-w-10"></i></span> Adicionar outro tamanho
										</a>
										<a href="#" class="mb-2 mr-2 btn btn-danger btn-remove hide" data-block="product">
											<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-trash-alt fa-w-10"></i></span> Remover este tamanho
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- FIM DO BLOCO "PRODUTO" --}}

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-button">
							{!! Form::buttons('product.list') !!}
						</div>
					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
