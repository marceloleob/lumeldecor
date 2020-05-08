@extends('admin.layouts.app')

@section('js-custom')
{!! Html::script('js/forms/jquery.validate.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.masks.min.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.masks.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/admin/pages.js', ['defer' => 'defer']) !!}
@stop

@section('content')

<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="fas fa-cubes icon-gradient bg-plum-plate"></i>
			</div>
			<div>
				Produtos
				<div class="page-title-subheading">Formulário para cadastrar os produtos.</div>
			</div>
		</div>
		<div class="page-title-actions">
			<div class="d-inline-block dropdown">
				<a href="{!! route('product.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
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

{!! Form::open(['id' => 'form-product', 'route' => 'product.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card card-basic-info">
				<div class="row">
					<div class="col-md-6">
						<div class="card-body"><h5 class="card-title">Informações Básicas</h5>
							<div class="row">
								<div class="col-md-12">
									<div class="position-relative form-group">
										{!! Form::label('supplier_id', 'Fornecedor*') !!}
										{!! Form::select('supplier_id', $optionssupplier, old('supplier_id', $data->supplier_id), ['class' => 'form-control selectpicker']) !!}
										{!! Form::notification('supplier_id', $errors) !!}
									</div>
									<div class="position-relative form-group">
										{!! Form::label('material_id', 'Material*') !!}
										{!! Form::select('material_id', $optionsmaterial, old('material_id', $data->material_id), ['class' => 'form-control selectpicker']) !!}
										{!! Form::notification('material_id', $errors) !!}
									</div>
									<div class="position-relative form-group">
										{!! Form::label('category_id', 'Categoria*') !!}
										{!! Form::select('category_id', $optionscategory, old('category_id', $data->category_id), ['class' => 'form-control selectpicker']) !!}
										{!! Form::notification('category_id', $errors) !!}
									</div>
									<div class="position-relative form-group">
										{!! Form::label('name', 'Nome do Produto*') !!}
										{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
										{!! Form::notification('name', $errors) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card-body"><h5 class="card-title">Detalhes</h5>
							<div class="row">
								<div class="col-md-12">
									<div class="position-relative form-group">
										{!! Form::label('description', 'Descrição') !!}
										{!! Form::textarea('description', old('description', $data->description), ['class' => 'form-control textarea', 'placeholder' => 'Detalhes do produto', 'rows' => '5']) !!}
										{!! Form::notification('description', $errors) !!}
									</div>
									<div class="position-relative form-group">
										{!! Form::label('hashtag', 'Hashtags') !!}
										{!! Form::textarea('hashtag', old('hashtag', $data->hashtag), ['class' => 'form-control textarea', 'placeholder' => 'Adicione as hashtags referentes ao produto', 'rows' => '6']) !!}
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

	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card card-dimension">
				<div class="row">
					<div class="col-md-6">
						<div class="card-body"><h5 class="card-title">Dimensões / Preços</h5>
							<div class="form-row">
								<div class="col-md-4">
									<div class="position-relative form-group">
										{!! Form::label('size', 'Tamanho*') !!}
										{!! Form::selectSize('size', old('size', $data->size), ['class' => 'form-control selectpicker']) !!}
										{!! Form::notification('size', $errors) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="position-relative form-group">
										{!! Form::label('weight', 'Peso*') !!}
										{!! Form::text('weight', old('weight', $data->weight), ['class' => 'form-control text']) !!}
										{!! Form::notification('weight', $errors) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="position-relative form-group">
										{!! Form::label('amount', 'Quantidade*') !!}
										{!! Form::text('amount', old('amount', $data->amount), ['class' => 'form-control text']) !!}
										{!! Form::notification('amount', $errors) !!}
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-4">
									<div class="position-relative form-group">
										{!! Form::label('lenght', 'Comprimento*') !!}
										{!! Form::text('lenght', old('lenght', $data->lenght), ['class' => 'form-control text']) !!}
										{!! Form::notification('lenght', $errors) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="position-relative form-group">
										{!! Form::label('width', 'Largura*') !!}
										{!! Form::text('width', old('width', $data->width), ['class' => 'form-control text']) !!}
										{!! Form::notification('width', $errors) !!}
									</div>
								</div>
								<div class="col-md-4">
									<div class="position-relative form-group">
										{!! Form::label('height', 'Altura*') !!}
										{!! Form::text('height', old('height', $data->height), ['class' => 'form-control text']) !!}
										{!! Form::notification('height', $errors) !!}
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="position-relative form-group">
										{!! Form::label('price_site', 'Preço no Site*') !!}
										{!! Form::text('price_site', old('price_site', $data->price_site), ['class' => 'form-control text']) !!}
										{!! Form::notification('price_site', $errors) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="position-relative form-group">
										{!! Form::label('price_supp', 'Preço no Fornecedor*') !!}
										{!! Form::text('price_supp', old('price_supp', $data->price_supp), ['class' => 'form-control text']) !!}
										{!! Form::notification('price_supp', $errors) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card-body"><h5 class="card-title">Exemplo</h5>
							<div class="row">
								<div class="col-md-12">
									<div class="card-box-example">
										<img src="{!! asset('images/box.jpeg') !!}" alt="" />
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
		<div class="col-md-6">
			<div class="main-card mb-3 card card-photo">
				<div class="card-body"><h5 class="card-title">Fotos</h5>
					<div class="row">
						<div class="col-md-12">
							<div class="position-relative form-group">
								{!! Form::label('photo1', 'Foto 01*') !!}
								{!! Form::file('photo1', ['class' => 'form-control selectpicker']) !!}
								{!! Form::notification('photo1', $errors) !!}
							</div>
							<div class="position-relative form-group">
								{!! Form::label('photo2', 'Foto 02') !!}
								{!! Form::file('photo2', ['class' => 'form-control selectpicker']) !!}
								{!! Form::notification('photo2', $errors) !!}
							</div>
							<div class="position-relative form-group">
								{!! Form::label('photo3', 'Foto 03') !!}
								{!! Form::file('photo3', ['class' => 'form-control selectpicker']) !!}
								{!! Form::notification('photo3', $errors) !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="main-card mb-3 card card-color">
				<div class="card-body"><h5 class="card-title">Cores</h5>
					<div class="row">
						<div class="col-md-12">
							<div class="position-relative form-group">
								{!! Form::label('color1', 'Cor Principal*') !!}
								{!! Form::select('color1', [], old('color1', $data->color1), ['class' => 'form-control selectpicker']) !!}
								{!! Form::notification('color1', $errors) !!}
							</div>
							<div class="position-relative form-group">
								{!! Form::label('color2', 'Cor Secundária') !!}
								{!! Form::select('color2', [], old('color2', $data->color2), ['class' => 'form-control selectpicker']) !!}
								{!! Form::notification('color2', $errors) !!}
							</div>
							<div class="position-relative form-group">
								{!! Form::label('color3', 'Cor Terciária') !!}
								{!! Form::select('color3', [], old('color3', $data->color3), ['class' => 'form-control selectpicker']) !!}
								{!! Form::notification('color3', $errors) !!}
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
				<div class="card-body"><h5 class="card-title">Caso queira adicionar um Produto similar</h5>
					<div class="row">
						<div class="col-md-12">
							<ul class="check_submit">
								<li>
									{!! Form::checkbox('duplicar1', 1, (old('duplicar1', $data->duplicar1) ? true : false), ['id' => 'duplicar1', 'class' => 'hide check-card', 'data-card' => 'card-basic-info']) !!}
									{!! Form::label('duplicar1', 'Replicar as "Informações Básicas e Detlahes" deste produto.') !!}
								</li>
								<li>
									{!! Form::checkbox('duplicar2', 1, (old('duplicar2', $data->duplicar2) ? true : false), ['id' => 'duplicar2', 'class' => 'hide check-card', 'data-card' => 'card-dimension']) !!}
									{!! Form::label('duplicar2', 'Replicar as "Dimensões / Preços" deste produto.') !!}
								</li>
								<li>
									{!! Form::checkbox('duplicar3', 1, (old('duplicar3', $data->duplicar3) ? true : false), ['id' => 'duplicar3', 'class' => 'hide check-card', 'data-card' => 'card-photo']) !!}
									{!! Form::label('duplicar3', 'Replicar as "Fotos" deste produto.') !!}
								</li>
								<li>
									{!! Form::checkbox('duplicar4', 1, (old('duplicar4', $data->duplicar4) ? true : false), ['id' => 'duplicar4', 'class' => 'hide check-card', 'data-card' => 'card-color']) !!}
									{!! Form::label('duplicar4', 'Replicar as "Cores" deste produto.') !!}
								</li>
							</ul>

							<div class="divider"></div>
							@if (isset($data->id))
								{!! Form::hidden('id', $data->id, ['id' => 'id']) !!}
							@endif
							{!! Form::button('<i class="fas fa-cloud-upload-alt fa-w-10"></i> &nbsp; Salvar &nbsp; &nbsp;', ['type' => 'submit', 'class' => 'btn btn-success mb-2 mr-2']) !!}
							<a href="{!! route('product.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
								<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-times-circle fa-w-10"></i></span> Cancelar
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
{!! Form::close() !!}

@endsection
