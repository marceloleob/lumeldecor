@extends('admin.layouts.forms')

@section('icon', 'fas fa-user-tie')
@section('title', 'Fornecedores')
@section('subheading', 'Formulário para editar o fornecedor da Loja Lumel Decor.')
@section('btn-back', route($page . '.list'))

@section('form')
	<div class="row">
		<div class="col-md-12">
			{!! Form::open(['id' => 'form-' . $page, 'route' => [$page . '.update', $data->id], 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Preencha o formulário</h5>
						<div class="form-row">
							<div class="col-md-6">
								<div class="position-relative form-group">
									Ainda falta fazer
								</div>
								<div class="position-relative form-group">
									{!! Form::switch('status', $data->status) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="main-card mb-3 card">
					<div class="card-button">
						{!! Form::buttons($page . '.list', $data->id) !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
