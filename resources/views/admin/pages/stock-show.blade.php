@extends('admin.layouts.forms')

@section('icon', 'fas fa-warehouse')
@section('title', 'Controle de Estoque')
@section('subheading', 'Formulário para atualizar o estoque do produto.')
@section('btn-back', route($page . '.list'))

@section('form')
	<div class="row">
		<div class="col-md-12">

			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title">Histórico do Estoque</h5>
					<div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">

						<div class="vertical-timeline-item vertical-timeline-element">
							<div>
								<span class="vertical-timeline-element-icon bounce-in">
									<i class="badge badge-dot badge-dot-xl badge-primary"> </i>
								</span>
								<div class="vertical-timeline-element-content bounce-in">
									<h4 class="timeline-title">Item criado no Sistema</h4>
									<p>
										Produto foi criado com 30 itens em estoque <br />
										Usuário responsável: <a href="javascript:void(0);">Ricardo Silveira</a>
									</p>
									<span class="vertical-timeline-element-date">02/06/2020</span>
								</div>
							</div>
						</div>

						<div class="vertical-timeline-item vertical-timeline-element">
							<div>
								<span class="vertical-timeline-element-icon bounce-in">
									<i class="badge badge-dot badge-dot-xl badge-primary"> </i>
								</span>
								<div class="vertical-timeline-element-content bounce-in">
									<h4 class="timeline-title">Reposição de Estoque</h4>
									<p>
										Foi adicionado 5 itens no estoque deste produto <br />
										Usuário responsável: <a href="javascript:void(0);">Lílian Silveira</a>
									</p>
									<span class="vertical-timeline-element-date">07/06/2020</span>
								</div>
							</div>
						</div>

						<div class="vertical-timeline-item vertical-timeline-element">
							<div>
								<span class="vertical-timeline-element-icon bounce-in">
									<i class="badge badge-dot badge-dot-xl badge-success"> </i>
								</span>
								<div class="vertical-timeline-element-content bounce-in">
									<h4 class="timeline-title">Venda no Site</h4>
									<p>
										Foi removido 2 itens do estoque deste produto <br />
										Cliente: <a href="javascript:void(0);">Paula Silveira Braga</a>
									</p>
									<span class="vertical-timeline-element-date">10/06/2020</span>
								</div>
							</div>
						</div>

						<div class="vertical-timeline-item vertical-timeline-element">
							<div>
								<span class="vertical-timeline-element-icon bounce-in">
									<i class="badge badge-dot badge-dot-xl badge-danger"> </i>
								</span>
								<div class="vertical-timeline-element-content bounce-in">
									<h4 class="timeline-title">Item devolvido</h4>
									<p>
										Foi devolvido 1 item para o estoque deste produto <br />
										Cliente: <a href="javascript:void(0);">Luana Silveira</a>
									</p>
									<span class="vertical-timeline-element-date">10/06/2020</span>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
