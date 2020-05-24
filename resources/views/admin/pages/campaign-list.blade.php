@extends('admin.layouts.lists')

@section('heading')
	<div class="page-title-icon">
		<i class="far fa-calendar-alt icon-gradient bg-plum-plate"></i>
	</div>
	<div>
		Campanhas
		<div class="page-title-subheading">Lista todas as campanhas.</div>
	</div>
@stop

@section('table')
	<table class="align-middle mb-0 table table-borderless table-striped table-hover">
		<thead>
			<tr>
				<th width="10%" class="text-center">Código</th>
				<th width="30%" class="text-left">Nome</th>
				<th width="30%" class="text-center">Período</th>
				<th width="15%" class="text-center">Status</th>
				<th width="15%" class="text-center">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $item)
			<tr>
				<td class="text-center text-muted">{!! $item->id !!}</td>
				<td class="text-left">{!! $item->name !!}</td>
				<td class="text-center">{!! $item->period !!}</td>
				<td class="text-center"><div id="div-{!! $item->id !!}" class="div-{!! $item->id !!} badge badge-{!! $item->status['class'] !!}">{!! $item->status['label'] !!}</div></td>
				<td class="text-center">
					<a href="{!! route($page . '.edit', [$item->id, $data->currentPage()]) !!}" class="border-0 btn-transition btn btn-outline-primary"><i class="far fa-edit"></i></a>
					<a href="{!! route($page . '.status', $item->id) !!}" class="border-0 btn-transition btn {!! $item->styles['class'] !!}"><i class="fas {!! $item->styles['label'] !!}"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection