@extends('admin.layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h4 class="inner_title mb-4">Mensagens recebidas do site</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (count($data))
                @foreach ($data as $item)
                <div class="message_item {!! ($item->read == 0) ? 'new' : '' !!}">
                    <a href="{!! route('contact-view', [$item->id, $data->currentPage()]) !!}">
                        {!! ($item->read == 0) ? '<span class="new">Não lida</span>' : '' !!}
                        <div class="left">
                            <span class="{!! ($item->read == 0) ? 'sender_name_new' : 'sender_name' !!}">{{ $item->name }}</span>
                            <p>{{ Str::limit($item->text, 200, '..') }}</p>
                        </div>
                        <div class="datetime">{{ $item->created_date }} <span>{{ $item->created_time }}</span></div>
                    </a>
                </div>
                @endforeach
            @else
                <div class="no-records-found">Nenhuma mensagem enviada do site</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="pagination_style my-5 d-flex">
                {!! $paginate !!}
            </div>
        </div>
    </div>

@endsection
