@extends('auth.layouts.main')

@section('js-custom')
{!! Html::script('admin/js/forms/jquery.validate.min.js', ['defer' => 'defer']) !!}
{!! Html::script('admin/js/forms/jquery.validate.' . strtolower(App::getLocale()) . '.js', ['defer' => 'defer']) !!}
{!! Html::script('admin/js/forms/jquery.maskedinput.min.js', ['defer' => 'defer']) !!}
{!! Html::script('admin/js/forms/validations.js', ['defer' => 'defer']) !!}
{!! Html::script('admin/js/forms/masks.' . strtolower(App::getLocale()) . '.js', ['defer' => 'defer']) !!}
@stop

@section('content')

    {{-- SIGN IN ACCOUNT --}}
    <section class="full_row header_margin bg_gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg_white sign_in_up" role="document">
                        <div class="header bg_primary">
                            <h4 class="inner-title text_white">Acessar a área administrativa</h4>
                        </div>
                        <div class="body">
                            {!! Form::open(['id' => 'form-login', 'route' => 'login', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
                                <div class="form-group">
									{!! Form::email('email', '', ['class' => 'form-control email emailOnly', 'placeholder' => 'E-mail']) !!}
									{!! Form::errorField('email', $errors) !!}
                                </div>
                                <div class="form-group">
									{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
									{!! Form::errorField('password', $errors) !!}
                                </div>
                                <div class="form-group form-button">
									<div class="password_recovery btn-left">Esqueceu sua senha? <a href="{!! route('password.request') !!}">Clique aqui</a>.</div>
                                    {!! Form::button('<i class="fa fa-sign-in-alt"></i> &nbsp; Entrar', ['type' => 'submit', 'class' => 'btn btn_primary_bg']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- SIGN IN ACCOUNT --}}

@endsection
