@extends('admin.layouts.forms')

@section('icon', 'fas fa-warehouse')
@section('title', 'Controle de Estoque')
@section('subheading', 'Formulário para atualizar o estoque do produto.')
@section('btn-back', route($page . '.list'))

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => [$page . '.update', $data->id], 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Preencha o formulário</h5>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('material', 'Material') !!}
									{!! Form::text('material', $data->product->material->name, ['class' => 'form-control readonly', 'readonly' => true]) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('category', 'Categoria') !!}
									{!! Form::text('category', $data->product->category->name, ['class' => 'form-control readonly', 'readonly' => true]) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('product', 'Produto') !!}
									{!! Form::text('product', $data->product->name, ['class' => 'form-control readonly', 'readonly' => true]) !!}
								</div>
								<div class="form-row">
									<div class="col-md-4">
										<div class="position-relative form-group">
											{!! Form::label('size', 'Tamanho') !!}
											{!! Form::text('size', $data->item->productSize->size, ['class' => 'form-control readonly', 'readonly' => true]) !!}
										</div>
									</div>
									<div class="col-md-4">
										<div class="position-relative form-group div-color">
											{!! Form::label('name', 'Cor(es)') !!}
											<div class="colors" style="{!! $data->background !!}" data-toggle="tooltip" data-placement="top" data-original-title="{!! $data->tooltip !!}"></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="position-relative form-group">
											{!! Form::label('balance', 'Quantidade em Estoque') !!}
											{!! Form::text('balance', $data->balance, ['class' => 'form-control readonly', 'readonly' => true]) !!}
										</div>
									</div>
								</div>

								<div class="position-relative form-group">
									{!! Form::label('shape', 'Ação', ['class' => 'required']) !!}
									<div class="radio-options">
										<div class="custom-radio custom-control custom-control-inline">
											{!! Form::radio('action', 'I', (empty(old('action')) || old('action') === 'I') ? true : false, ['id' => 'action-I', 'class' => 'custom-control-input action']) !!}
											{!! Form::label('action-I', 'Adicionar no Estoque', ['class' => 'custom-control-label']) !!}
										</div>
										<div class="custom-radio custom-control custom-control-inline">
											{!! Form::radio('action', 'O', (old('action') === 'O') ? true : false, ['id' => 'action-O', 'class' => 'custom-control-input action']) !!}
											{!! Form::label('action-O', 'Remover do Estoque', ['class' => 'custom-control-label']) !!}
										</div>
									</div>
									{!! Form::notification('action', $errors) !!}
								</div>

								<div class="form-row">
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('reason_id', 'Motivo', ['class' => 'required']) !!}
											{!! Form::text('reason_id', old('reason_id'), ['class' => 'form-control text']) !!}
											{!! Form::notification('reason_id', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('amount', 'Quantidade', ['class' => 'required']) !!}
											{!! Form::text('amount', old('amount'), ['class' => 'form-control text']) !!}
											{!! Form::notification('amount', $errors) !!}
										</div>
									</div>
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
