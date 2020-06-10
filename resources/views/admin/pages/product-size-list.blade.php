
@if (count($items))

	<div class="row">
		<div class="col-md-12">
			<hr />
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title">Lista dos tamanhos deste produto</h5>
					<div class="table-responsive">
						<table class="table table-hover table-striped table-bordered dtr-inline align-middle mb-0">
							<thead>
								<tr>
									<th width="50%" class="text-left">Produto</th>
									<th width="10%" class="text-center">Tamanho</th>
									<th width="10%" class="text-center">Formato</th>
									<th width="10%" class="text-center">Peso</th>
									<th width="20%" class="text-center">Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($items as $item)
								<tr>
									<td class="text-left">{!! $item->productName !!} - {!! $item->size !!}</td>
									<td class="text-center bold">
										<a href="{!! route('product-size.edit', [$item->id]) !!}" class="border-0 btn-icon btn-icon-only btn-pill btn btn-outline-info"><strong>{!! $item->size !!}</strong></a>
									</td>
									<td class="text-center">{!! $item->shape !!}</td>
									<td class="text-center">{!! $item->weight !!}</td>
									<td class="text-center">
										<a href="{!! route('product-size.edit', [$item->id]) !!}" class="border-0 btn-transition btn btn-outline-primary"><i class="far fa-edit"></i></a>
										<a href="{!! route('item.create', [$item->productId, $item->id]) !!}" class="btn-icon btn btn-outline-alternate"><i class="fas fa-plus-circle fa-w-10 pr-2"></i> Adicionar Cores</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

@endif
