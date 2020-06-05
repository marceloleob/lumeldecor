@extends('admin.layouts.lists')

@section('icon', 'fas fa-warehouse')
@section('title', 'Estoque')
@section('subheading', '(ainda não está definido como vou fazer).')
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
	<table class="align-middle mb-0 table table-borderless table-striped table-hover">
		<thead>
			<tr>
				<th width="15%" class="text-left">Material</th>
				<th width="15%" class="text-left">Categoria</th>
				<th width="40%" class="text-left">Produto</th>
				<th width="10%" class="text-center">Quantidade</th>
				<th width="10%" class="text-center">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $item)
			<tr>
				<td class="text-left">{!! $item->materialName !!}</td>
				<td class="text-left">{!! $item->categoryName !!}</td>
				<td class="text-left">{!! $item->productName !!}</td>
				<td class="text-center">23</td>
				<td class="text-center">
					<a href="{!! route($page . '.edit', [$item->id]) !!}" class="border-0 btn-transition btn btn-outline-primary"><i class="fas fa-arrow-right"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
