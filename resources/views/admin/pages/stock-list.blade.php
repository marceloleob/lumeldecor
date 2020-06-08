@extends('admin.layouts.lists')

@section('icon', 'fas fa-warehouse')
@section('title', 'Controle de Estoque')
@section('subheading', 'Lista todos os itens dos produtos para gerenciar o estoque.')

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
	@if (isset($data))
		<table class="table table-hover table-striped table-bordered dtr-inline align-middle mb-0">
			<thead>
				<tr>
					<th width="8%" class="text-center">Código</th>
					<th width="10%" class="text-left">Material</th>
					<th width="10%" class="text-left">Categoria</th>
					<th width="5%" class="text-center">Cores</th>
					<th width="10%" class="text-center">Tamanho</th>
					<th width="35%" class="text-left">Produto</th>
					<th width="10%" class="text-center">Quantidade</th>
					<th width="12%" class="text-center">Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $item)
				<tr>
					<td class="text-center text-muted">{!! $item->id !!}</td>
					<td class="text-left">{!! $item->materialName !!}</td>
					<td class="text-left">{!! $item->categoryName !!}</td>
					<td class="text-center td-color">
						<div class="colors" style="{!! $item->background !!}" data-toggle="tooltip" data-placement="top" data-original-title="{!! $item->tooltip !!}"></div>
					</td>
					<td class="text-center">{!! $item->size !!}</td>
					<td class="text-left">{!! $item->productName !!}</td>
					<td class="text-center">{!! $item->balance !!}</td>
					<td class="text-center">
						<a href="{!! route($page . '.edit', [$item->id]) !!}" class="border-0 btn-transition btn btn-outline-primary"><i class="far fa-edit"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endsection
