@extends('admin.layouts.lists')

@section('icon', 'fas fa-user-tag')
@section('title', 'Funcionários')
@section('subheading', 'Lista todos os funcionários cadastrados no site.')
@section('btn-add', route($page . '.create'))

@section('table')
	<table class="align-middle mb-0 table table-borderless table-striped table-hover">
		<thead>
			<tr>
				<th width="8%" class="text-center">Código</th>
				<th width="30%" class="text-left">Cliente</th>
				<th width="25%" class="text-left">E-mail</th>
				<th width="15%" class="text-center">Celular</th>
				<th width="10%" class="text-center">Status</th>
				<th width="12%" class="text-center">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $item)
			<tr>
				<td class="text-center text-muted">{!! $item->id !!}</td>
				<td class="text-left">{!! $item->user->name !!}</td>
				<td class="text-left">{!! $item->user->email !!}</td>
				<td class="text-center">{!! $item->cellphone !!}</td>
				<td class="text-center"><div id="div-{!! $item->id !!}" class="div-{!! $item->id !!} badge badge-{!! $item->status['class'] !!}">{!! $item->status['label'] !!}</div></td>
				<td class="text-center">
					<a href="{!! route($page . '.edit', [$item->id]) !!}" class="border-0 btn-transition btn btn-outline-primary"><i class="far fa-edit"></i></a>
					<a href="{!! route($page . '.status', $item->id) !!}" class="border-0 btn-transition btn {!! $item->styles['class'] !!}"><i class="fas {!! $item->styles['label'] !!}"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
