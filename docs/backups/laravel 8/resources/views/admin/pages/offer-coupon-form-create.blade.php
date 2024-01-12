@extends('admin.layouts.forms')

@section('icon', 'fas fa-money-check-alt')
@section('title', 'Cupons de Desconto')
@section('subheading', 'Formulário para cadastrar os cupons de desconto do site.')
@section('btn-back', route($page . '.list'))

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => $page . '.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Preencha o formulário</h5>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									{!! Form::label('name', 'Nome para identificar o Cupom', ['class' => 'required']) !!}
									{!! Form::text('name', old('name'), ['class' => 'form-control text']) !!}
									{!! Form::notification('name', $errors) !!}
								</div>
								<div class="position-relative form-group">
									{!! Form::label('code', 'Código do Cupom (palavra chave)', ['class' => 'required']) !!}
									{!! Form::text('code', old('code'), ['class' => 'form-control text input-coupon uppercase stripspaces']) !!}
									{!! Form::notification('code', $errors) !!}
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('kind', 'Tipo do desconto', ['class' => 'required']) !!}
											{!! Form::selectKind('kind', old('kind'), ['class' => 'form-control kind selectpicker', 'title' => 'Selecione']) !!}
											{!! Form::notification('kind', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('amount', 'Valor do Cupom', ['class' => 'required']) !!}
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text prepend-kind"></span></div>
												{!! Form::text('amount', old('amount'), ['class' => 'form-control decimal']) !!}
												<div class="input-group-append"><span class="input-group-text append-kind"></span></div>
											</div>
											{!! Form::notification('amount', $errors) !!}
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('start_date', 'Data de Início', ['class' => 'required']) !!}
											<div class="input-group">
												{!! Form::text('start_date', old('start_date'), ['class' => 'form-control datepicker']) !!}
												<div class="input-group-append"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></div>
											</div>
											{!! Form::notification('start_date', $errors) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="position-relative form-group">
											{!! Form::label('finish_date', 'Data do Término', ['class' => 'required']) !!}
											<div class="input-group">
												{!! Form::text('finish_date', old('finish_date'), ['class' => 'form-control datepicker']) !!}
												<div class="input-group-append"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></div>
											</div>
											{!! Form::notification('finish_date', $errors) !!}
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
