@extends('auth.layouts.main')

@section('js-custom')
{!! Html::script('js/forms/jquery.validate.min.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.validate.' . strtolower(App::getLocale()) . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.maskedinput.min.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/validations.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/masks.' . strtolower(App::getLocale()) . '.js', ['defer' => 'defer']) !!}
@stop

@section('content')

	{{-- SIGN IN ACCOUNT --}}
	<div class="row">
		<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
		<div class="col-lg-6">
			<div class="p-5">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Área Administrativa</h1>
				</div>
				{!! Form::open(['id' => 'form-login', 'route' => 'login', 'method' => 'POST', 'role' => 'form', 'class' => 'user']) !!}
					<div class="form-group">
							{!! Form::email('email', '', ['class' => 'form-control form-control-user email emailOnly', 'placeholder' => 'E-mail']) !!}
							{!! Form::errorField('email', $errors) !!}
					</div>
					<div class="form-group">
						{!! Form::password('password', ['class' => 'form-control form-control-user', 'placeholder' => 'Senha']) !!}
						{!! Form::errorField('password', $errors) !!}
					</div>
					<div class="text-center">
						{!! Form::button('<i class="fa fa-sign-in-alt"></i> &nbsp; Entrar', ['type' => 'submit', 'class' => 'btn btn-primary btn-user btn-block']) !!}
					</div>
				{!! Form::close() !!}
				<hr />
				<div class="text-center">
					<div class="small">Esqueceu sua senha? <a href="{!! route('password.request') !!}">Clique aqui</a>.</div>
				</div>
			</div>
		</div>
	</div>
    {{-- SIGN IN ACCOUNT --}}

@endsection
