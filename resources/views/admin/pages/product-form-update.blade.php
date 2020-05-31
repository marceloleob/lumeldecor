@extends('admin.layouts.forms')

@section('heading')
	<div class="page-title-icon">
		<i class="fas fa-cubes icon-gradient bg-plum-plate"></i>
	</div>
	<div>
		Produtos
		<div class="page-title-subheading">Formulário para editar o produto do site.</div>
	</div>
@stop

@section('form')
<div class="row">
	<div class="col-md-12">
		{!! Form::open(['id' => 'form-' . $page, 'route' => [$page . '.update', $data->id], 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
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
												{!! Form::select('material_id', $optionsmaterial, old('material_id', $data->category->material->id), ['class' => 'form-control selectpicker']) !!}
												{!! Form::notification('material_id', $errors) !!}
											</div>
											<div class="position-relative form-group">
												{!! Form::label('category_id', 'Categoria', ['class' => 'required']) !!}
												{!! Form::select('category_id', $optionscategory, old('category_id', $data->category->id), ['class' => 'form-control selectpicker']) !!}
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

<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Lista dos tamanhos deste produto</h5>
				<div class="table-responsive">
					<table class="align-middle mb-0 table table-borderless table-striped table-hover">
						<thead>
							<tr>
								<th width="10%" class="text-center">Tamanho</th>
								<th width="50%" class="text-left">Produto</th>
								<th width="10%" class="text-center">Comprimento</th>
								<th width="10%" class="text-center">Largura</th>
								<th width="10%" class="text-center">Altura</th>
								<th width="10%" class="text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($items as $item)
							<tr>
								<td class="text-center">{!! $item->size !!}</td>
								<td class="text-left">{!! $item->name !!}</td>
								<td class="text-center">{!! $item->length !!}</td>
								<td class="text-center">{!! $item->width !!}</td>
								<td class="text-center">{!! $item->height !!}</td>
								<td class="text-center">
									<a href="{!! route('product-size.edit', [$item->id]) !!}" class="border-0 btn-transition btn btn-outline-primary"><i class="far fa-edit"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
