
<div class="app-footer">
	<div class="app-footer-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 py-1">
					<span class="text-center d-block"><i class="far fa-copyright"></i> Copyright {!! date('Y') !!} - <span class="company">{!! Config::get('app.name') !!}</span> - Todos os direitos reservados</span>
				</div>
				<div class="col-lg-12 col-sm-12 py-1">
					<span class="text-center d-block">Site criado por <a href="https://www.turnupweb.com" class="turnupweb" target="_blank">TurnUP Web</a></span>
				</div>
			</div>
		</div>
	</div>
</div>

{!! Form::open(['id' => 'form-logout', 'route' => 'logout', 'method' => 'POST', 'style' => 'display: none;']) !!}
	{!! csrf_field() !!}
{!! Form::close() !!}

<div id="toast-container" class="toast-top-right">
	<div class="toast toast-error" aria-live="assertive" style="">
		<button type="button" class="toast-close-button" role="button">×</button>
		<div class="toast-title">Erro</div>
		<div class="toast-message" id="toast-message"></div>
	</div>
</div>
