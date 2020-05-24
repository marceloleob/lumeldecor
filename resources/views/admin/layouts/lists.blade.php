@extends('admin.layouts.app')

@section('content')

	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				@yield('heading')
			</div>
			<div class="page-title-actions">
				@if (! request()->is('admin/usuario/*'))
				<div class="d-inline-block dropdown">
					<a href="{!! route($page . '.create') !!}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">
						<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-plus-circle fa-w-20"></i></span> Adicionar
					</a>
				</div>
				@endif
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
								{!! Form::open(['id' => 'form-search', 'route' => $page . '.search', 'method' => 'POST', 'role' => 'group']) !!}
									<div class="custom-control custom-control-inline input-group">
										{!! Form::text('search', ($search ?? ''), ['class' => 'form-control', 'placeholder' => 'Procurar por nome']) !!}
										<div class="input-group-append mr-2">
											{!! Form::button('<i class="fas fa-search pr-2 pl-2"></i>', ['type' => 'submit', 'class' => 'btn btn-focus']) !!}
										</div>
										<a href="{!! route($page . '.list') !!}" class="btn btn-focus"><i class="fas fa-backspace pr-2 pl-2"></i> Limpar a busca</a>
									</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
					<div class="table-responsive">
						@if (count($data))
							@yield('table')
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
						Ainda não existe nenhum "{!! ucfirst($page) !!}" cadastrado.
					</div>
				</div>
			</div>
		</div>
	@endif

@endsection
