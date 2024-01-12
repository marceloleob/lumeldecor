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

						<div class="row mb-4">
							<div class="col-md-12 d-flex px-3 py-2 my-2">
								<div class="stock-title">{!! $data->product->name !!} - {!! $data->item->productSize->size !!}</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="position-relative form-group div-color">
											{!! Form::label('name', 'Cor(es) deste item:') !!}
											<div class="colors" style="{!! $data->background !!}" data-toggle="tooltip" data-placement="top" data-original-title="{!! $data->tooltip !!}"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('balance', 'Quantidade em Estoque:') !!}
											<div class="stock-amount">{!! $data->balance !!}</div>
											{!! Form::hidden('current_amount', $data->balance, ['id' => 'current_amount']) !!}
										</div>
									</div>
									<div class="col-md-12 p-4 stock-options">
										<div class="position-relative form-group">
											<div class="radio-options">
												<div class="custom-radio custom-control custom-control-inline">
													{!! Form::radio('action', 'I', (empty(old('action')) || old('action') === 'I') ? true : false, ['id' => 'action-I', 'class' => 'custom-control-input action']) !!}
													{!! Form::label('action-I', 'Adicionar', ['class' => 'custom-control-label']) !!}
												</div>
												<div class="custom-radio custom-control custom-control-inline">
													{!! Form::radio('action', 'O', (old('action') === 'O') ? true : false, ['id' => 'action-O', 'class' => 'custom-control-input action']) !!}
													{!! Form::label('action-O', 'Remover', ['class' => 'custom-control-label']) !!}
												</div>
											</div>
											{!! Form::notification('action', $errors) !!}
										</div>
									</div>
									<div class="col-md-12">
										<div class="position-relative form-group">
											{!! Form::label('reason_id', 'Motivo', ['class' => 'required']) !!}
											{!! Form::select('reason_id', $optionsreason, old('reason_id'), ['class' => 'form-control selectpicker', 'title' => 'Selecione']) !!}
											{!! Form::notification('reason_id', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('amount', 'Quantidade', ['class' => 'required']) !!}
											{!! Form::number('amount', old('amount'), ['class' => 'form-control text', 'id' => 'amount']) !!}
											{!! Form::notification('amount', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('balance', 'Quanto vai ficar no Estoque:') !!}
											<div class="stock-amount new-amount">{!! $data->balance !!}</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="main-card mb-3 card">
					<div class="card-button">
						{!! Form::hidden('product_id', $data->product_id, ['id' => 'product_id']) !!}
						{!! Form::hidden('item_id', $data->item_id, ['id' => 'item_id']) !!}
						{!! Form::buttons($page . '.list', $data->id) !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
