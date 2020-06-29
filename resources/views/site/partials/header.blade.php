
{{-- TOPO --}}
<div class="top-header middle-header dark_skin">
	<div class="container">
		<div class="nav_block">
			<a class="navbar-brand" href="{!! route('home') !!}">
				<img class="logo_light" src="{!! asset('images/logo_light.png') !!}" alt="{!! Config::get('app.name') !!}" />
				<img class="logo_dark" src="{!! asset('images/logo_dark.png') !!}" alt="{!! Config::get('app.name') !!}" />
			</a>
			<div class="contact_phone order-md-last">
				<a href="https://wa.me/553195140615" target="_blank" sdata-toggle="tooltip" sdata-placement="top" sdata-original-title="Nosso WhatsApp"><i class="fab fa-whatsapp"></i> <span>31 99514-0615</span></a>
			</div>
			<div class="product_search_form">
				{!! Form::open(['id' => 'form-search', 'method' => 'POST', 'role' => 'form', 'class' => 'form']) !!}
					<div class="input-group">
						{!! Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Procure pelo nome do produto..']) !!}
						{!! Form::button('<i class="linearicons-magnifier"></i>', ['id', 'btn-search', 'class' => 'search_btn']) !!}
					</div>
					{!! Form::notification('search', $errors) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
{{-- TOPO FIM --}}
