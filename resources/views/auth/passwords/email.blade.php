@extends('auth.layouts.main')

@section('js-custom')
{!! Html::script('js/forms/jquery.validate.min.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.validate.' . strtolower(App::getLocale()) . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.maskedinput.min.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/validations.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/masks.' . strtolower(App::getLocale()) . '.js', ['defer' => 'defer']) !!}
@stop

@section('content')

	{{-- FORGOT PASSWORD --}}
	<div class="row">
		<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
		<div class="col-lg-6">
			<div class="p-5">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Esqueci minha senha</h1>
				</div>
				<p>Preencha seu e-mail, clique no botão e logo depois vamos enviar um link para seu e-mail.</p>
				{!! Form::open(['id' => 'form-password-email', 'route' => 'password.email', 'method' => 'POST', 'role' => 'form', 'class' => 'user']) !!}
				<div class="form-group">
					{!! Form::email('email', '', ['class' => 'form-control form-control-user email emailOnly', 'placeholder' => 'E-mail']) !!}
					{!! Form::errorField('email', $errors) !!}
				</div>
				<div class="text-center">
					{!! Form::button('<i class="fa fa-unlink"></i> &nbsp; Resetar minha senha', ['type' => 'submit', 'class' => 'btn btn-primary btn-user btn-block']) !!}
				</div>
				{!! Form::close() !!}
				<hr />
				<div class="text-center">
					<a href="{!! route('login') !!}" class="small"><i class="fas fa-arrow-alt-circle-left"></i> &nbsp; Voltar</a>
				</div>
			</div>
		</div>
	</div>
	{{-- FORGOT PASSWORD --}}

@endsection
