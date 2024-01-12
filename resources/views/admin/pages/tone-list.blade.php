@extends('admin.layouts.lists')

@section('icon', 'fas fa-swatchbook')
@section('title', 'Tonalidades')
@section('subheading', 'Lista todas as tonalidades dos produtos.')
@section('btn-add', route($page . '.create'))

@section('search')
	<div class="position-relative mr-2">
		{!! Form::select('color_id', $optionscolor, ($color ?? ''), ['class' => 'selectpicker', 'title' => 'Selecione uma Cor']) !!}
	</div>
@endsection

@section('table')
	<table class="table table-hover table-striped table-bordered dtr-inline align-middle mb-0">
		<thead>
			<tr>
				<th width="8%" class="text-center">Código</th>
				<th width="15%" class="text-center">Cores</th>
				<th width="5%" class="text-center">&nbsp;</th>
				<th width="50%" class="text-left">Tonalidade</th>
				<th width="10%" class="text-center">Status</th>
				<th width="12%" class="text-center">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $item)
			<tr>
				<td class="text-center text-muted">{!! $item->id !!}</td>
				<td class="text-left">{!! $item->color !!}</td>
				<td class="text-center td-color"><div class="swatch-holder-md" style="background-color: {!! $item->hexa !!}"></div></td>
				<td class="text-left">{!! $item->tone !!}</td>
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
