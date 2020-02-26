<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', strtolower(App::getLocale())) }}">

@include('admin.partials.head')

<body class="bg-gradient-primary">

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-10">
				<div class="card-body p-0">
					{{-- CONTENT --}}
					<div class="mt_md_50">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- FOOTER --}}
	@include('admin.partials.footer')
</div>

{{-- SCRIPTS --}}
@include('admin.partials.scripts')

</body>
</html>
