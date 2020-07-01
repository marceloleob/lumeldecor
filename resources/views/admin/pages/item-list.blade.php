
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
					<h5 class="card-title">Lista dos itens deste produto</h5>
					<div class="table-responsive">
						<table class="table table-hover table-striped table-bordered dtr-inline align-middle mb-0">
							<thead>
								<tr>
									<th width="8%" class="text-center">Cores</th>
									<th width="44%" class="text-center">Produto</th>
									<th width="15%" class="text-center">Preço no Site</th>
									<th width="10%" class="text-center">Lançamento</th>
									<th width="8%" class="text-center">Status</th>
									<th width="10%" class="text-center">Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($items as $item)
								<tr>
									<td class="text-center td-color">
										<div class="colors" style="{!! $item->background !!}" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $item->tooltip !!}"></div>
									</td>
									<td class="text-left">{!! $item->productName !!} - {!! $item->size !!}</td>
									<td class="text-center">R$ {!! $item->sPriceFormatted !!}</td>
									<td class="text-center">{!! $item->launch !!}</td>
									<td class="text-center"><div  class="badge badge-{!! $item->status['class'] !!}">{!! $item->status['label'] !!}</div></td>
									<td class="text-center">
										<a href="{!! route('item.edit', [$item->id, $item->product_id, $item->product_size_id]) !!}" class="border-0 btn-transition btn btn-outline-primary" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="far fa-edit"></i></a>
										<a href="{!! route('item.status', [$item->id, $item->product_id, $item->product_size_id]) !!}" class="border-0 btn-transition btn {!! $item->styles['class'] !!}"><i class="fas {!! $item->styles['label'] !!}"></i></a>
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
