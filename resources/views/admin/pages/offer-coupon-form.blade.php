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
				<i class="fas fa-money-check-alt icon-gradient bg-plum-plate"></i>
			</div>
			<div>
				Cupons de Desconto
				<div class="page-title-subheading">Formulário para cadastrar os cupons de desconto.</div>
			</div>
		</div>
		<div class="page-title-actions">
			<div class="d-inline-block dropdown">
				<a href="{!! route('coupon.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
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
		<div class="main-card mb-3 card">
			<div class="card-body"><h5 class="card-title">Preencha o formulário</h5>
				<div class="row">
					<div class="col-md-6">
						{!! Form::open(['id' => 'form-coupon', 'route' => 'coupon.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
							<div class="row">
								<div class="col-md-12">
									<div class="position-relative form-group">
										{!! Form::label('name', 'Nome para identificar o Cupom*') !!}
										{!! Form::text('name', old('name', $data->name), ['class' => 'form-control text']) !!}
										{!! Form::notification('name', $errors) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="position-relative form-group">
										{!! Form::label('code', 'Código do Cupom*') !!}
										{!! Form::text('code', old('code', $data->code), ['class' => 'form-control text']) !!}
										{!! Form::notification('code', $errors) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="position-relative form-group">
										{!! Form::label('start_date', 'Data de Início*') !!}
										{!! Form::text('start_date', old('start_date', $data->start_date), ['class' => 'form-control text']) !!}
										{!! Form::notification('start_date', $errors) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="position-relative form-group">
										{!! Form::label('finish_date', 'Data do Término*') !!}
										{!! Form::text('finish_date', old('finish_date', $data->finish_date), ['class' => 'form-control text']) !!}
										{!! Form::notification('finish_date', $errors) !!}
									</div>
								</div>
							</div>

							<div class="divider"></div>
							@if (isset($data->id))
								{!! Form::hidden('id', $data->id, ['id' => 'id']) !!}
							@endif
							{!! Form::button('<i class="fas fa-cloud-upload-alt fa-w-10"></i> &nbsp; Salvar &nbsp; &nbsp;', ['type' => 'submit', 'class' => 'btn btn-success mb-2 mr-2']) !!}
							<a href="{!! route('coupon.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-focus">
								<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-times-circle fa-w-10"></i></span> Cancelar
							</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
