
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title">Lista dos tamanhos deste produto</h5>
					<div class="table-responsive">
						<table class="table table-hover table-striped table-bordered dtr-inline align-middle mb-0">
							@if (count($items))
								<thead>
									<tr>
										<th width="20%" class="text-center">Tamanho</th>
										<th width="65%" class="text-left">Produto</th>
										<th width="15%" class="text-center">Ações</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($items as $item)
									<tr>
										<td class="text-center bold">
											<a href="{!! route('product-size.edit', [$item->id]) !!}" class="border-0 btn-icon btn-icon-only btn-pill btn btn-outline-info"><strong>{!! $item->size !!}</strong></a>
										</td>
										<td class="text-left">{!! $item->productName !!} - {!! $item->size !!}</td>
										<td class="text-center">
											<a href="{!! route('product-size.edit', [$item->id]) !!}" class="border-0 btn-transition btn btn-outline-primary"><i class="far fa-edit"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							@endif

							@if (!$item->uniqueSize)
								<tfoot>
									<tr>
										<td colspan="3"><hr /></td>
									</tr>
									<tr>
										<td colspan="3" class="text-center">
											<a href="{!! route('product-size.create', $data->id) !!}" class="mb-2 mr-2 btn btn-info">
												<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-plus-circle fa-w-10"></i></span> Adicionar outro tamanho para este produto
											</a>
										</td>
									</tr>
								</tfoot>
							@endif
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
