
	<div class="row row-list-items">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title">Lista dos itens deste produto</h5>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							@if (count($items))
								<thead>
									<tr>
										<th width="15%" class="text-center">Código</th>
										<th width="10%" class="text-center">Cores</th>
										<th width="10%" class="text-center">Tamanho</th>
										<th width="35%" class="text-left">Produto</th>
										<th width="10%" class="text-center">Lançamento</th>
										<th width="10%" class="text-center">Status</th>
										<th width="10%" class="text-center">Ações</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($items as $item)
									<tr>
										<td class="text-center">{!! $item->code !!}</td>
										<td class="text-center td-color">
											@foreach ($item->colors as $color)
												<div class="colors" style="background-color: {!! $color->hexa !!}" data-toggle="tooltip" data-placement="top" data-original-title="{!! $color->name !!}"></div>
											@endforeach
										</td>
										<td class="text-center">{!! $item->size !!}</td>
										<td class="text-left">{!! $item->productName !!}</td>
										<td class="text-center">{!! $item->launch !!}</td>
										<td class="text-center"><div id="div-{!! $item->id !!}" class="div-{!! $item->id !!} badge badge-{!! $item->status['class'] !!}">{!! $item->status['label'] !!}</div></td>
										<td class="text-center">
											<a href="{!! route('item.edit', $item->id) !!}" class="border-0 btn-transition btn btn-outline-primary"><i class="far fa-edit"></i></a>
											<a href="{!! route('item.status', [$item->id, $item->product_size_id]) !!}" class="border-0 btn-transition btn {!! $item->styles['class'] !!}"><i class="fas {!! $item->styles['label'] !!}"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							@endif
							<tfoot>
								<tr>
									<td colspan="7"><hr /></td>
								</tr>
								<tr>
									<td colspan="7" class="text-center">
										<a href="{!! route('item.create', [$data->product_id, $data->id]) !!}" class="mb-2 mr-2 btn btn-alternate">
											<span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-plus-circle fa-w-10"></i></span> Adicionar cores para este tamanho de produto
										</a>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
