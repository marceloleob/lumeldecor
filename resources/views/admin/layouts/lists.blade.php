@extends('admin.layouts.app')

@section('content')

	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="@yield('icon') icon-gradient bg-plum-plate"></i>
				</div>
				<div>
					@yield('title')
					<div class="page-title-subheading">@yield('subheading')</div>
				</div>
			</div>
			<div class="page-title-actions">
				@if (! request()->is('admin/usuario/*'))
				<div class="d-inline-block dropdown">
					<a href="@yield('btn-add')" class="mb-2 mr-2 btn-transition btn btn-outline-primary">
						<span class="btn-icon-wrapper pr-1 opacity-9"><i class="fas fa-plus-circle"></i></span> Adicionar
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

	@if (count($data) || $search || $category || $material)
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">

					<div class="card-header">Lista
						<nav class="navbar card-search-pane-right">
							{!! Form::open(['id' => 'form-search', 'route' => $page . '.search', 'method' => 'POST', 'class' => 'form-inline my-2 my-lg-0']) !!}
								<div class="form-row">
									@yield('search')
									<div class="position-relative mr-2">
									{!! Form::text('search', ($search ?? ''), ['class' => 'form-control search', 'placeholder' => 'Procurar por nome']) !!}
									</div>
									<div class="position-relative mr-2">
										{!! Form::button('<i class="fas fa-search btn-icon-wrapper pr-1"></i> BUSCAR', ['type' => 'submit', 'class' => 'btn btn-icon btn-dark pl-2']) !!}
									</div>
									<div class="position-relative">
										<a href="{!! route('stock.list') !!}" class="btn btn-icon btn-dark pl-2"><i class="fas fa-backspace btn-icon-wrapper pr-1"></i> Limpar</a>
									</div>
								</div>
							{!! Form::close() !!}
						</nav>
					</div>

					<div class="table-responsive">
						@if (count($data))
							@yield('table')
						@else
							<div class="card-no-records">
								Nenhum registro encontrado.
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
						Nenhum registro cadastrado.
					</div>
				</div>
			</div>
		</div>
	@endif

@endsection
