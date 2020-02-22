@extends('auth.layouts.main')

@section('content')

    {{-- RESET PASSWORD --}}
    <section class="full_row header_margin bg_gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg_white sign_in_up" role="document">
                        <div class="header bg_primary">
                            <h4 class="inner-title text_white">Nova senha</h4>
                        </div>
                        <div class="body">
                            <p>Preencha com seu e-mail e sua nova senha para acessar nossa área administrativa.</p>
                            {!! Form::open(['id' => 'form-password-reset', 'route' => 'password.update', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
                                <div class="form-group">
                                    {!! Form::email('email', '', ['class' => 'form-control email emailOnly', 'placeholder' => 'E-mail']) !!}
                                    {!! Form::errorField('email', $errors) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Nova senha']) !!}
                                    {!! Form::errorField('password', $errors) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::password('password_confirm', ['id' => 'password-confirm', 'class' => 'form-control', 'placeholder' => 'Confirme sua nova senha']) !!}
                                    {!! Form::errorField('password_confirm', $errors) !!}
                                </div>
                                <div class="form-group form-button">
                                    {!! Form::hidden('token', $token); !!}
                                    {!! Form::button('<i class="fa fa-unlink"></i> &nbsp; Resetar minha senha', ['type' => 'submit', 'class' => 'btn btn_primary_bg']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- RESET PASSWORD --}}

@endsection
