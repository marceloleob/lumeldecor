@extends('auth.layouts.main')

@section('js-custom')
{!! Html::script('js/forms/jquery.validate.min.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.validate.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.maskedinput.min.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/validations.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/masks.' . $locale . '.js', ['defer' => 'defer']) !!}
@stop

@section('content')

	{{-- SIGN IN ACCOUNT --}}
	<div class="wrap-login100">
		{!! Form::open(['id' => 'form-login', 'route' => 'login', 'method' => 'POST', 'role' => 'form', 'class' => '']) !!}
			<span class="login100-form-title p-b-40">Área Administrativa</span>

			<div class="form-group">
				{!! Form::email('email', '', ['class' => 'form-control email emailOnly', 'placeholder' => 'E-mail']) !!}
				{!! Form::errorField('email', $errors) !!}
			</div>
			<div class="form-group">
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
				{!! Form::errorField('password', $errors) !!}
			</div>

			<div class="container-login100-form-btn">
				<div class="wrap-login100-form-btn">
					<div class="login100-form-bgbtn"></div>
					{!! Form::button('Entrar', ['type' => 'submit', 'class' => 'login100-form-btn']) !!}
				</div>
			</div>

			<div class="text-center p-t-30">
				<span class="txt1">
					Esqueceu sua senha? <a href="{!! route('password.request') !!}" class="txt2">Clique aqui</a>.
				</span>
			</div>
		{!! Form::close() !!}
	</div>
    {{-- SIGN IN ACCOUNT --}}

@endsection
