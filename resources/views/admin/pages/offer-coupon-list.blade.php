@extends('admin.layouts.lists')

@section('icon', 'fas fa-money-check-alt')
@section('title', 'Cupons de Desconto')
@section('subheading', 'Lista todos os cupons de desconto.')
@section('btn-add', route($page . '.create'))

@section('table')
	<table class="table table-hover table-striped table-bordered dtr-inline align-middle mb-0">
		<thead>
			<tr>
				<th width="8%" class="text-center">Código</th>
				<th width="15%" class="text-center">Palavra Chave</th>
				<th width="35%" class="text-left">Cupom</th>
				<th width="20%" class="text-center">Período</th>
				<th width="10%" class="text-center">Status</th>
				<th width="12%" class="text-center">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $item)
			<tr>
				<td class="text-center text-muted">{!! $item->id !!}</td>
				<td class="text-center">{!! $item->code !!}</td>
				<td class="text-left">{!! $item->name !!}</td>
				<td class="text-center">{!! $item->period !!}</td>
				<td class="text-center"><div  class="badge badge-{!! $item->status['class'] !!}">{!! $item->status['label'] !!}</div></td>
				<td class="text-center">
					<a href="{!! route($page . '.edit', [$item->id]) !!}" class="border-0 btn-transition btn btn-outline-primary"><i class="far fa-edit"></i></a>
					<a href="{!! route($page . '.status', $item->id) !!}" class="border-0 btn-transition btn {!! $item->styles['class'] !!}"><i class="fas {!! $item->styles['label'] !!}"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
