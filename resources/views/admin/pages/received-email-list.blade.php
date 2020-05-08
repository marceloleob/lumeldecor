@extends('admin.layouts.app')

@section('content')

<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="fas fa-envelope icon-gradient bg-plum-plate"></i>
			</div>
			<div>
				Mensagens
				<div class="page-title-subheading">Mensagens recebidas do Site.</div>
			</div>
		</div>
		<div class="page-title-actions">
			<div class="d-inline-block dropdown">
				<a href="{!! route('category.form') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">
					<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-plus-circle fa-w-20"></i></span> Adicionar
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
            <h4 class="inner_title mb-4">Mensagens recebidas do site</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (count($data))
                @foreach ($data as $item)
                <div class="message_item {!! ($item->read == 0) ? 'new' : '' !!}">
                    <a href="{!! route('contact.view', [$item->id, $data->currentPage()]) !!}">
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
