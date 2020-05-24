@extends('admin.layouts.lists')

@section('heading')
	<div class="page-title-icon">
		<i class="fas fa-palette icon-gradient bg-plum-plate"></i>
	</div>
	<div>
		Cores
		<div class="page-title-subheading">Lista todos as cores dos produtos cadastrados.</div>
	</div>
@stop

@section('table')
	<table class="align-middle mb-0 table table-borderless table-striped table-hover">
		<thead>
			<tr>
				<th width="10%" class="text-center">Código</th>
				<th width="10%" class="text-center">Cores</th>
				<th width="50%" class="text-left">Nome</th>
				<th width="15%" class="text-center">Status</th>
				<th width="15%" class="text-center">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $item)
			<tr>
				<td class="text-center text-muted">{!! $item->id !!}</td>
				<td class="text-center td-color"><div class="swatch-holder-md" style="background-color: {!! $item->hexa !!}"></div></td>
				<td class="text-left">{!! $item->name !!}</td>
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
