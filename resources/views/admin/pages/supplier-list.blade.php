@extends('admin.layouts.main')

@section('content')

<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="fas fa-user-tie icon-gradient bg-plum-plate"></i>
			</div>
			<div>
				Fornecedores
				<div class="page-title-subheading">Lista todos os fornecedores cadastrados no site.</div>
			</div>
		</div>
		<div class="page-title-actions">
			<div class="d-inline-block dropdown">
				<a href="{!! route('supplier-form') !!}" class="btn-shadow btn btn-info">
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

@if (count($data))
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-header">Lista
					<div class="btn-actions-pane-right search">
						<div role="group" class="btn-group-sm btn-group">
							{!! Form::open(['id' => 'form-search', 'route' => 'suppliers-search', 'method' => 'POST', 'role' => 'group']) !!}
								<div class="custom-control custom-control-inline input-group">
									{!! Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Procurar por contato']) !!}
									<div class="input-group-append mr-2">
										{!! Form::button('<i class="fas fa-search pr-2 pl-2"></i>', ['type' => 'submit', 'class' => 'btn btn-focus']) !!}
									</div>
									{!! Form::button('<i class="fas fa-backspace pr-2 pl-2"></i> Limpar a busca', ['type' => 'submit', 'class' => 'btn btn-focus']) !!}
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="align-middle mb-0 table table-borderless table-striped table-hover">
						<thead>
							<tr>
								<th width="10%" class="text-center"><b>Código</b></th>
								<th width="20%" class="text-left"><b>Forncecedor</b></th>
								<th width="20%" class="text-left"><b>Contato</b></th>
								<th width="20%" class="text-left"><b>E-mail</b></th>
								<th width="10%" class="text-center"><b>Celular</b></th>
								<th width="10%" class="text-center"><b>Status</b></th>
								<th width="10%" class="text-center"><b>Ações</b></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $item)
							<tr>
								<td class="text-center text-muted">{!! $item->code !!}</td>
								<td class="text-left">{!! $item->company !!}</td>
								<td class="text-left">{!! $item->contacts[0]->name !!}</td>
								<td class="text-left">{!! $item->contacts[0]->email !!}</td>
								<td class="text-center">{!! $item->contacts[0]->cellphone !!}</td>
								<td class="text-center">
									<div id="div-{!! $item->id !!}" class="div-{!! $item->id !!} badge badge-{!! $item->status['class'] !!}">{!! $item->status['label'] !!}</div>
								</td>
								<td class="text-center">
									<a href="{!! route('supplier-edit', [$item->id, $data->currentPage()]) !!}" class="btn btn-primary btn-sm">Editar</a>
									<button id="toggle-status" data-id="{!! $item->id !!}" data-model="supplier" class="border-0 btn-transition btn {!! $item->trash['class'] !!}"><i class="fas {!! $item->trash['label'] !!}"></i></button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
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
					Nenhum registro encontrado!
				</div>
			</div>
		</div>
	</div>
@endif

@endsection
