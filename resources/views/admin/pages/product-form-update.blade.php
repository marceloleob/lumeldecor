@extends('admin.layouts.forms')

@section('icon', 'fas fa-cubes')
@section('title', 'Produtos')
@section('subheading', 'Formulário para editar o produto do site.')
@section('btn-back', route($page . '.list'))

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => [$page . '.update', $data->id], 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="row row-product">
					<div class="col-md-12">
						<div class="main-card mb-3 card">
							<div class="row">
								<div class="col-md-6">
									<div class="card-body">
										<h5 class="card-title">Informações do Produto</h5>
										<div class="row">
											<div class="col-md-12">
												<div class="position-relative form-group">
													{!! Form::label('material_id', 'Material', ['class' => 'required']) !!}
													{!! Form::select('material_id', $optionsmaterial, old('material_id', $data->category->material->id), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
													{!! Form::notification('material_id', $errors) !!}
												</div>
												<div class="position-relative form-group">
													{!! Form::label('category_id', 'Categoria', ['class' => 'required']) !!}
													{!! Form::select('category_id', $optionscategory, old('category_id', $data->category->id), ['class' => 'form-control selectpicker', 'title' => 'Selecione primeiro um Material']) !!}
													{!! Form::hidden('category_id_hide', $data->category->id) !!}
													{!! Form::notification('category_id', $errors) !!}
												</div>
												<div class="position-relative form-group">
													{!! Form::label('name', 'Nome do Produto', ['class' => 'required']) !!}
													{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
													{!! Form::notification('name', $errors) !!}
												</div>
												<div class="position-relative form-group featured">
													<ul class="button-checkbox">
														<li>
															{!! Form::checkbox('featured', '1', (old('featured', $data->featured) ? true : false), ['id' => 'featured', 'class' => 'hide']) !!}
															{!! Form::label('featured', 'Destacar este produto no Site.') !!}
														</li>
														<li>
															{!! Form::checkbox('launch', 1, (old('launch', $data->launch) ? true : false), ['id' => 'launch', 'class' => 'hide']) !!}
															{!! Form::label('launch', 'Este produto é um lançamento') !!}
														</li>
													</ul>
												</div>
												<div class="position-relative form-group">
													{!! Form::switch('status', $data->status) !!}
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
													{!! Form::textarea('description', old('description', $data->description), ['class' => 'form-control textarea', 'placeholder' => 'Detalhes do produto', 'rows' => '6']) !!}
													{!! Form::notification('description', $errors) !!}
												</div>
												<div class="position-relative form-group">
													{!! Form::label('hashtag', 'Hashtags') !!}
													{!! Form::textarea('hashtag', old('hashtag', $data->hashtag), ['class' => 'form-control textarea', 'placeholder' => 'Adicione as hashtags referentes ao produto', 'rows' => '5']) !!}
													{!! Form::notification('hashtag', $errors) !!}
												</div>
											</div>
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

	@include('admin.pages.product-size-list')

@endsection
