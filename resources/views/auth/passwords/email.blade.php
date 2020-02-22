@extends('auth.layouts.main')

@section('js-custom')
{!! Html::script('admin/js/forms/jquery.validate.min.js', ['defer' => 'defer']) !!}
{!! Html::script('admin/js/forms/jquery.validate.' . strtolower(App::getLocale()) . '.js', ['defer' => 'defer']) !!}
{!! Html::script('admin/js/forms/jquery.maskedinput.min.js', ['defer' => 'defer']) !!}
{!! Html::script('admin/js/forms/validations.js', ['defer' => 'defer']) !!}
{!! Html::script('admin/js/forms/masks.' . strtolower(App::getLocale()) . '.js', ['defer' => 'defer']) !!}
@stop

@section('content')

    {{-- FORGOT PASSWORD --}}
    <section class="full_row header_margin bg_gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg_white sign_in_up" role="document">
                        <div class="header bg_primary">
                            <h4 class="inner-title text_white">Esqueci minha senha</h4>
                        </div>
                        <div class="body">
                            <p>Preencha seu e-mail, clique no botão "Resetar minha senha" e vamos enviar um link para seu e-mail.</p>
                            {!! Form::open(['id' => 'form-password-email', 'route' => 'password.email', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
                                <div class="form-group">
                                    {!! Form::email('email', '', ['class' => 'form-control email emailOnly', 'placeholder' => 'E-mail']) !!}
                                    {!! Form::errorField('email', $errors) !!}
                                </div>
                                <div class="form-group form-button">
									<a href="{!! route('login') !!}" class="btn btn-back btn-left"><i class="fas fa-arrow-alt-circle-left"></i> &nbsp; Voltar</a>
                                    {!! Form::button('<i class="fa fa-unlink"></i> &nbsp; Resetar minha senha', ['type' => 'submit', 'class' => 'btn btn_primary_bg']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- FORGOT PASSWORD --}}

@endsection
