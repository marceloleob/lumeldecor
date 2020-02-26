@extends('auth.layouts.main')

@section('js-custom')
{!! Html::script('js/forms/jquery.validate.min.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.validate.' . strtolower(App::getLocale()) . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.maskedinput.min.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/validations.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/masks.' . strtolower(App::getLocale()) . '.js', ['defer' => 'defer']) !!}
@stop

@section('content')

	{{-- RESET PASSWORD --}}
	<div class="row">
		<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
		<div class="col-lg-6">
			<div class="p-5">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Resetar minha senha</h1>
				</div>
				<p>Preencha com seu e-mail e sua nova senha para acessar nossa área administrativa.</p>
				{!! Form::open(['id' => 'form-password-reset', 'route' => 'password.update', 'method' => 'POST', 'role' => 'form', 'class' => 'user']) !!}
				<div class="form-group">
					{!! Form::email('email', '', ['class' => 'form-control form-control-user email emailOnly', 'placeholder' => 'E-mail']) !!}
					{!! Form::errorField('email', $errors) !!}
				</div>
				<div class="form-group">
					{!! Form::password('password', ['id' => 'password', 'class' => 'form-control form-control-user', 'placeholder' => 'Nova senha']) !!}
					{!! Form::errorField('password', $errors) !!}
				</div>
				<div class="form-group">
					{!! Form::password('password_confirm', ['id' => 'password-confirm', 'class' => 'form-control form-control-user', 'placeholder' => 'Confirme sua nova senha']) !!}
					{!! Form::errorField('password_confirm', $errors) !!}
				</div>
				<div class="text-center">
					{!! Form::button('<i class="fa fa-unlink"></i> &nbsp; Resetar minha senha', ['type' => 'submit', 'class' => 'btn btn-primary btn-user btn-block']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	{{-- RESET PASSWORD --}}

@endsection
