
<div class="container">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="page-title">
				<h1>{!! $title !!}</h1>
			</div>
		</div>
		<div class="col-md-6">
			<ol class="breadcrumb justify-content-md-end">
				<li class="breadcrumb-item"><a href="{!! route('home') !!}">Página Inicial</a></li>
				@yield('breadcrumb')
			</ol>
		</div>
	</div>
</div>
