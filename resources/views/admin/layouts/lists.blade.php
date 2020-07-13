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
				@if (!request()->is('admin/usuario/*') && !request()->is('admin/estoque/*'))
				<div class="d-inline-block dropdown">
					<a href="@yield('btn-add')" class="mb-2 mr-2 btn-icon btn-shadow btn btn-outline-primary">
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

	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">

				<div class="card-header">Lista
					<nav class="navbar card-search-pane-right">
						{!! Form::open(['id' => 'form-search', 'route' => $page . '.search', 'method' => 'POST', 'class' => 'form']) !!}
							<div class="form-row">
								{{-- OUTROS FILTROS --}}
								@yield('search')
								{{-- FILTRO POR NOME --}}
								<div class="col-xl-5 col-lg-6 col-md-6">
									<div class="form-search-fields">
										{!! Form::text('search', ($search ?? ''), ['class' => 'form-control search mr-2', 'placeholder' => 'Procurar por nome']) !!}
										{!! Form::button('<i class="fas fa-search btn-icon-wrapper pr-1"></i> BUSCAR', ['type' => 'submit', 'class' => 'btn btn-icon btn-dark mr-2']) !!}
										<a href="{!! route($page . '.list') !!}" class="btn btn-icon btn-dark"><i class="fas fa-backspace btn-icon-wrapper pr-1"></i> Limpar</a>
									</div>
								</div>
							</div>
						{!! Form::close() !!}
					</nav>
				</div>

				@if (isset($data) && count($data))
					<div class="table-responsive">
						@yield('table')
					</div>
					<div class="card-footer">
						<div class="col-md-12 pt-3">
							<div class="float-left">{!! $paginate !!}</div>
							<div class="float-right">Exibindo de {!! $data->firstItem() !!} até {!! $data->lastItem() !!} de um total de {!! $data->total() !!} registros.</div>
						</div>
					</div>
				@else
					<div class="card-no-records">
						@if (request()->is('admin/estoque/*'))
							Preencha alguma informação para encontrar o item do produto
						@else
							Nenhum registro encontrado!
						@endif
					</div>
				@endif

			</div>
		</div>
	</div>

@endsection
