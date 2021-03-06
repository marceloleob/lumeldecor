@extends('admin.layouts.app')

@section('content')

<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="fas fa-dolly icon-gradient bg-plum-plate"></i>
			</div>
			<div>
				Encomendas
				<div class="page-title-subheading">Lista todas as encomendas feitas pelo Site.</div>
			</div>
		</div>
		<div class="page-title-actions">
			<div class="d-inline-block dropdown">
				<a href="{!! route('order.create') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">
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

@if (count($data) || $search)
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-header">Lista
					<div class="btn-actions-pane-right search">
						<div role="group" class="btn-group-sm btn-group">
							{!! Form::open(['id' => 'form-search', 'route' => 'order.search', 'method' => 'POST', 'role' => 'group']) !!}
								<div class="custom-control custom-control-inline input-group">
									{!! Form::text('search', ($search ?? ''), ['class' => 'form-control', 'placeholder' => 'Procurar por nome']) !!}
									<div class="input-group-append mr-2">
										{!! Form::button('<i class="fas fa-search pr-2 pl-2"></i>', ['type' => 'submit', 'class' => 'btn btn-focus']) !!}
									</div>
									<a href="{!! route('order.list') !!}" class="btn btn-focus"><i class="fas fa-backspace pr-2 pl-2"></i> Limpar a busca</a>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<div class="table-responsive">
					@if (count($data))
						<table class="table table-hover table-striped table-bordered dtr-inline align-middle mb-0">
							<thead>
								<tr>
									<th width="10%" class="text-center">Código</th>
									<th width="15%" class="text-left">Material</th>
									<th width="45%" class="text-left">Categoria</th>
									<th width="15%" class="text-center">Status</th>
									<th width="15%" class="text-center">Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td class="text-center text-muted">{!! $item->id !!}</td>
									<td class="text-left">{!! $item->material->name !!}</td>
									<td class="text-left">{!! $item->name !!}</td>
									<td class="text-center"><div  class="badge badge-{!! $item->status['class'] !!}">{!! $item->status['label'] !!}</div></td>
									<td class="text-center">
										<a href="{!! route('order.edit', [$item->id]) !!}" class="border-0 btn-transition btn btn-outline-primary" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="far fa-edit"></i></a>
										<a href="{!! route('order.toggle', $item->id) !!}" class="border-0 btn-transition btn {!! $item->trash['class'] !!}"><i class="fas {!! $item->trash['label'] !!}"></i></a>
									</td>
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
					Ainda não existe nenhuma "Encomenda" cadastrada.
				</div>
			</div>
		</div>
	</div>
@endif

@endsection
