@extends('admin.layouts.lists')

@section('icon', 'fas fa-users-cog')
@section('title', 'Usuários do Sistema')
@section('subheading', 'Lista todos os usuários do sistema.')

@section('table')
	<table class="table table-hover table-striped table-bordered dtr-inline align-middle mb-0">
		<thead>
			<tr>
				<th width="8%" class="text-center">Código</th>
				<th width="15%" class="text-center">Tipo</th>
				<th width="55%" class="text-left">Nome</th>
				<th width="10%" class="text-center">Status</th>
				<th width="12%" class="text-center">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $item)
			<tr>
				<td class="text-center text-muted">{!! $item->id !!}</td>
				<td class="text-left">{!! $item->rule->name !!}</td>
				<td class="text-left">{!! $item->name !!}</td>
				<td class="text-center"><div  class="badge badge-{!! $item->status['class'] !!}">{!! $item->status['label'] !!}</div></td>
				<td class="text-center">
					<a href="{!! route($page . '.edit', [$item->id]) !!}" class="border-0 btn-transition btn btn-outline-primary" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="far fa-edit"></i></a>
					<a href="{!! route($page . '.status', $item->id) !!}" class="border-0 btn-transition btn {!! $item->styles['class'] !!}"><i class="fas {!! $item->styles['label'] !!}"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
