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
				<a href="{!! route('message.list') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">
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

	{{-- <div class="row">
		<div class="col-md-12">
			<h4 class="inner_title mb-4">Mensagens recebidas do site</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			@if (count($data))
				@foreach ($data as $item)
				<div class="message_item {!! ($item->read == 0) ? 'new' : '' !!}">
					<a href="{!! route('message.view', [$item->id]) !!}">
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
	</div> --}}



	@if (count($data) || $search)
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-header">E-mails
					<div class="btn-actions-pane-right search">
						<div role="group" class="btn-group-sm btn-group">
							{!! Form::open(['id' => 'form-search', 'route' => 'category.search', 'method' => 'POST', 'role' => 'group']) !!}
								<div class="custom-control custom-control-inline input-group">
									{!! Form::text('search', ($search ?? ''), ['class' => 'form-control', 'placeholder' => 'Procurar por nome']) !!}
									<div class="input-group-append mr-2">
										{!! Form::button('<i class="fas fa-search pr-2 pl-2"></i>', ['type' => 'submit', 'class' => 'btn btn-focus']) !!}
									</div>
									<a href="{!! route('category.list') !!}" class="btn btn-focus"><i class="fas fa-backspace pr-2 pl-2"></i> Limpar a busca</a>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<div class="table-responsive">
					@if (count($data))
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td class="text-center">{!! ($item->read == 0) ? 'Nova' : '&nbsp;' !!}</td>
									<td class="text-left">
										<div class="message_item ">
											<a href="{!! route('message.view', [$item->id]) !!}">
												<div class="left">
													<span class="{!! ($item->read == 0) ? 'sender_name_new' : 'sender_name' !!}">{{ $item->name }}</span>
													<p>{{ Str::limit($item->text, 100, '..') }}</p>
												</div>
											</a>
										</div>
									</td>
									<td class="text-center">{{ $item->created_date }} <span>{{ $item->created_time }}</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<div class="card-no-records">
							Nenhum registro encontrado com a palavra: "{!! $search !!}".
						</div>
					@endif
				</div>
				<div class="card-footer">
					<div class="col-md-12 pt-3">
						<div class="float-left">{!! $paginate !!}</div>
						<div class="float-right">Exibindo de {!! $data->firstItem() !!} até {!! $data->lastItem() !!} de um total de {!! $data->total() !!} registros.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@else
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-no-records">
					Ainda não existe nenhuma "Mensagem" do site.
				</div>
			</div>
		</div>
	</div>
@endif

@endsection
