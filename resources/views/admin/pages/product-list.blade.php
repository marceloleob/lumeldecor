@extends('admin.layouts.lists')

@section('icon', 'fas fa-cubes')
@section('title', 'Produtos')
@section('subheading', 'Lista todos os produtos cadastrados no sistema.')
@section('btn-add', route($page . '.create'))

@section('search')
	<div class="position-relative mr-2">
		{!! Form::select('material_id', $optionsmaterial, ($material ?? ''), ['class' => 'selectpicker', 'title' => 'Selecione um Material']) !!}
	</div>
	<div class="position-relative mr-2">
		{!! Form::select('category_id', $optionscategory, ($category ?? ''), ['class' => 'selectpicker', 'title' => 'Selecione uma Categoria']) !!}
		{!! Form::hidden('category_id_hide', ($category ?? '')) !!}
	</div>
@endsection

@section('table')
	<table class="table table-hover table-striped table-bordered dtr-inline align-middle mb-0">
		<thead>
			<tr>
				<th width="14%" class="text-left pl-3">Material</th>
				<th width="14%" class="text-left">Categoria</th>
				<th width="40%" class="text-left">Produto</th>
				<th width="10%" class="text-center">Destaque</th>
				<th width="10%" class="text-center">Status</th>
				<th width="12%" class="text-center">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $item)
			<tr>
				<td class="text-left pl-3">{!! $item->materialName !!}</td>
				<td class="text-left">{!! $item->categoryName !!}</td>
				<td class="text-left">{!! $item->productName !!}</td>
				<td class="text-center">{!! $item->featured !!}</td>
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
