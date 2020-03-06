@extends('admin.layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12 bg_white py_20">
            @if (isset($data))

                <div class="row msg_item">
                    <div class="col-md-8">
                        <div class="left">
                            <p>{!! $data->name !!}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="datetime">{!! $data->created_date !!}</div>
                    </div>
                </div>
                <div class="row msg_text mt-3">
                    <div class="col-md-12">
                        <span class="subject">{!! $data->subject !!}</span>
                        <p>{!! nl2br($data->text) !!}</p>
                    </div>
                </div>
                <div class="row msg_info mt-3">
                    <div class="col-md-6">
                        <p><i class="fas fa-reply"></i> Informações de contato para responder:</p>
                    </div>
                    <div class="col-md-6">
                        <div class="infos"><i class="far fa-envelope"></i> <span class="text_primary">{!! $data->email !!}</span></div>
                        <div class="infos"><i class="fas fa-phone"></i> <span class="text_primary">{!! $data->phone !!}</span></div>
                    </div>
                </div>
                <hr />
                <div class="row msg_replay p-3">
                    <div class="col-md-6">
                        <a href="{!! route('contact-list', ['page' => $page]) !!}" class="btn btn_primary"><i class="fas fa-mail-bulk"></i> &nbsp; Voltar</a>
                    </div>
                    <div class="col-md-6 right">
                        {!! Form::open(['route' => 'contact-form', 'method' => 'POST', 'role' => 'form']) !!}
                            {!! Form::hidden('id', $data->id) !!}
                            {!! Form::hidden('read', false) !!}
                            {!! Form::hidden('page', $page) !!}
                            {!! Form::button('<i class="fas fa-envelope"></i> &nbsp; Marcar como não lido', ['type' => 'submit', 'class' => 'submit btn btn_primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @else
                <div class="no-records-found">Você deve selecionar uma mensagem válida</div>
            @endif
        </div>
    </div>

@endsection
